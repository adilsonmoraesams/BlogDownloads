using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using System.Text.Json;
using System.Text;
using System.Text.RegularExpressions;
using System.Net;
using Models;
using scrap.Models;
using scrap.Repository;

namespace scrap.src
{
    public class Scraping
    {
        IWebDriver driver;
        List<Filme> listFilme = new List<Filme>();
        int maxNumeroPagina = 3;
        int numeroPagina = 1;

        public Scraping()
        {
            ChromeOptions options = new ChromeOptions();
            options.AddArgument("no-sandbox");
            options.AddArgument("--remote-allow-origins=*");
            options.AddArgument("--allowed-ips");
            options.AddArgument("--allowed-ips");
            options.AddArgument("--headless");

            this.driver = new ChromeDriver(options);

            InitScrapSemTorrent("https://semtorrent.com/" + this.numeroPagina);
        }

        private void InitScrapSemTorrent(string novoLink)
        {
            Console.WriteLine("Iniciando scrap: {0}", novoLink);

            driver.Navigate().GoToUrl(novoLink);
            driver.Manage().Timeouts().PageLoad.Add(System.TimeSpan.FromSeconds(120));
            var element = driver.FindElements(By.XPath("/html/body/div[1]/div/div[1]/div/div"));

            foreach (var item in element)
            {
                var Filme = new Filme();

                var a = item.FindElement(By.TagName("a"));
                Filme.Titulo = a.GetDomAttribute("title");
                Filme.Link = a.GetDomAttribute("href");

                var dataPublicacao = item.FindElement(By.TagName("time"));
                Filme.DataPublicacao = DateTime.Parse(dataPublicacao.GetDomAttribute("datetime"));

                listFilme.Add(Filme);
            }

            if (listFilme.Count > 0)
            {
                List<Filme> filmes = getDadosFilmesSemTorrent(listFilme);

                var db = new MySqlContext();

                foreach (var filme in filmes)
                {
                    if (!db.ExisteFilme(filme))
                    {
                        filme.Id = db.InsertFilme(filme);
                        if (filme.Id > 0)
                        {
                            if (filme.LinkDownloads != null && filme.LinkDownloads.Count > 0)
                            {
                                foreach (var link in filme.LinkDownloads.ToList())
                                {
                                    link.IdFilme = filme.Id;
                                    db.InsertLink(link);
                                }
                            }
                        }
                    }
                    else
                    {
                        Console.WriteLine("Já existe o filme: " + filme.Titulo);
                    }
                }
            }

            // var nextLink = driver.FindElements(
            //     By.XPath("/html/body/div[1]/div/div[2]/div/ul/li[5]/a")
            // );

            // if (nextLink[0] != null)
            // {
            //     var proximoLink = nextLink[0].GetDomAttribute("href");
            //     if (proximoLink != null)
            //     {
            //             // Console.WriteLine(proximoLink);
            //             // Console.WriteLine(this.maxNumeroPagina);
            //             // Console.WriteLine(this.maxPagina);
            //         if (this.numeroPagina <= this.maxNumeroPagina)
            //         {
            //             this.numeroPagina++;
            //             Console.WriteLine(proximoLink);
            //             InitScrapSemTorrent(proximoLink);
            //         }
            //     }
            // }


            if (this.numeroPagina <= this.maxNumeroPagina)
            {
                this.numeroPagina++;
                InitScrapSemTorrent("https://semtorrent.com/" + this.numeroPagina + "/");
            }else{
                Console.ReadKey();
            }
        }

        private List<Filme> getDadosFilmesSemTorrent(List<Filme> listFilmes)
        {
            for (int i = 0; i < listFilmes.Count; i++)
            {
                driver.Navigate().GoToUrl(listFilmes[i].Link);
                var element = driver.FindElement(By.XPath("//*[@id=\"informacoes\"]"));
                string[] strings = element.Text.Split(
                    Environment.NewLine,
                    StringSplitOptions.RemoveEmptyEntries
                );

                // Ano Lançamento
                var lancamento = Array.FindAll(strings, s => s.Contains("Lançamento"));
                if (lancamento.Count() > 0)
                {
                    listFilmes[i].AnoLancamento = lancamento[0].Replace("Lançamento: ", "").Trim();
                }

                // Gênero
                var genero = Array.FindAll(strings, s => s.Contains("Gênero"));
                if (genero.Count() > 0)
                {
                    listFilmes[i].Genero = genero[0].Replace("Gênero: ", "").Trim();
                }

                // Idioma
                var idioma = Array.FindAll(strings, s => s.Contains("Idioma"));
                if (idioma.Count() > 0)
                {
                    listFilmes[i].Idioma = idioma[0].Replace("Idioma: ", "").Trim();
                }

                // Duração
                var duracao = Array.FindAll(strings, s => s.Contains("Duração"));
                if (duracao.Count() > 0)
                {
                    listFilmes[i].Duracao = duracao[0].Replace("Duração: ", "").Trim();
                }

                // Tamanho
                var tamanho = Array.FindAll(strings, s => s.Contains("Tamanho"));
                if (tamanho.Count() > 0)
                {
                    listFilmes[i].Tamanho = tamanho[0].Replace("Tamanho: ", "").Trim();
                }

                // Classificação
                var classificacao = Array.FindAll(strings, s => s.Contains("Classificação"));
                if (classificacao.Count() > 0)
                {
                    listFilmes[i].Classificacao = classificacao[0]
                        .Replace("Classificação: ", "")
                        .Trim();
                }

                // Qualidade
                var qualidade = Array.FindAll(strings, s => s.Contains("Qualidade"));
                if (qualidade.Count() > 0)
                {
                    listFilmes[i].Qualidade = qualidade[0].Replace("Qualidade: ", "").Trim();
                }

                // Formato
                var formato = Array.FindAll(strings, s => s.Contains("Formato"));
                if (formato.Count() > 0)
                {
                    listFilmes[i].Formato = formato[0].Replace("Formato: ", "").Trim();
                }

                // Vídeo / Audio
                if (strings[8] != null)
                {
                    var result = Array.FindAll(strings, s => s.Contains("Áudio"));
                    if (result.Count() > 0)
                    {
                        var AudioVideo = result[0].Split("/");
                        if (AudioVideo.Count() > 0)
                        {
                            listFilmes[i].Video = AudioVideo[0].Trim().Replace("Vídeo: ", "");
                            listFilmes[i].Audio = AudioVideo[1].Trim().Replace("Áudio: ", "");
                        }
                    }
                }

                // IMDB (10)
                var imdb = Array.FindAll(strings, s => s.Contains("Nota da Crítica"));
                if (imdb.Count() > 0)
                {
                    listFilmes[i].Imdb = strings[10].Replace("Nota da Crítica: ", "").Trim();
                }

                // Categoria Filmes, Série... (10)
                var categoria = Array.FindAll(strings, s => s.Contains("Categoria"));
                if (categoria.Count() > 0)
                    listFilmes[i].Categoria = strings[11].Replace("Categoria: ", "").Trim();

                // Elenco
                var elenco = driver.FindElement(
                    By.XPath("/html/body/div[1]/div/div[1]/div[2]/div[4]")
                );
                listFilmes[i].Elenco = elenco.Text.Trim();

                // Sinopse
                var sinopse = driver.FindElement(By.XPath("//*[@id=\"sinopse\"]"));
                listFilmes[i].Sinopse = sinopse.Text.Replace("Sinopse: ", "").Trim();

                // Trailler
                var trailler = driver.FindElement(
                    By.XPath("/html/body/div[1]/div/div[1]/div[2]/div[3]/iframe")
                );
                listFilmes[i].Trailler = trailler.GetDomAttribute("src");

                // Imagem
                var url = driver.FindElement(By.XPath("/html/body/div[1]/div/div[1]/img"));
                string jsonString = url.GetDomAttribute("src");
                listFilme[i].ImagemCapa = ImageUrlToBase64(jsonString);

                // Copiar links
                var LinkDownload = new List<LinkDownload>();
                var linksElement = driver.FindElements(By.XPath("//*[@id=\"lista_download\"]/a"));
                foreach (var item in linksElement)
                {
                    var linkDownload = new LinkDownload();
                    linkDownload.Url = item.GetAttribute("href");
                    linkDownload.Titulo = item.GetAttribute("title");
                    LinkDownload.Add(linkDownload);
                }
                listFilme[i].LinkDownloads = LinkDownload;
            }

            return listFilme;
        }

        public static string ImageUrlToBase64(string imageUrl)
        {
            WebClient client = new WebClient();
            //Download the image as stream.
            byte[] image = client.DownloadData(imageUrl);
            return Convert.ToBase64String(image);
        }
    }
}
