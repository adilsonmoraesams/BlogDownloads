using System.Reflection.PortableExecutable;
using System.IO;
using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using System.Threading.Tasks;
using scrap.src;
using Models;
using scrap.Repository;

namespace scrap;

class Program
{
    static void Main(string[] args)
    {
        // ChromeOptions options = new ChromeOptions();
        // options.AddArgument("--remote-allow-origins=*");
        // options.AddArgument("--allowed-ips");
        // options.AddArgument("--headless");

        // IWebDriver driver = new ChromeDriver(options);
        // driver.Navigate().GoToUrl("https://semtorrent.com/");

        // listScrapFilmes

        var scrap = new Scraping(); 

      //   foreach (var filme in filmes) { 
      //    Console.WriteLine(filme.Titulo);
      //   }
        //   Filme filme = new Filme();
        //   filme.Titulo = "asdasdasdas";

        //   var db = new MySqlContext();
        //   await db.InsertFilme(filme);
    }
}
