using System;
using System.Threading.Tasks;
using Models;
using MySqlConnector;
using scrap.Models;

namespace scrap.Repository
{
    class MySqlContext
    {
        public MySqlConnectionStringBuilder Conexao()
        {
            var builder = new MySqlConnectionStringBuilder
            {
                Server = "localhost",
                Database = "blog",
                UserID = "root",
                Password = "Crocante@1316",
                SslMode = MySqlSslMode.Disabled,
            };
            return builder;
        }

        public bool ExisteFilme(Filme filme)
        {
            var builder = Conexao();

            using (var conn = new MySqlConnection(builder.ConnectionString))
            {
                Console.WriteLine("Opening connection");
                conn.Open();

                using (var command = conn.CreateCommand())
                {
                    command.CommandText = "SELECT count(*) FROM Filme WHERE Titulo like @Titulo;";
                    command.Parameters.AddWithValue("@Titulo", filme.Titulo);

                    using (var reader = command.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            if (reader.GetInt32(0) > 0)
                            {
                                return true;
                            }
                        }
                    }

                    Console.WriteLine("xxx");
                }
            }

            return false;
        }

        public int InsertFilme(Filme filme)
        {
            var builder = Conexao();

            using (var conn = new MySqlConnection(builder.ConnectionString))
            {
                Console.WriteLine("Iniciando insert filme");
                conn.Open();

                using (var command = conn.CreateCommand())
                {
                    command.CommandText =
                        @"INSERT INTO Filme (
                        Titulo,
                        Imdb,
                        Genero,
                        Elenco,
                        Idioma,
                        Qualidade,
                        Duracao,
                        AnoLancamento,
                        Video,
                        Audio,
                        Sinopse,
                        Trailler,
                        ImagemCapa,
                        Categoria,
                        DataPublicacao
                    ) VALUES (
                        @Titulo,
                        @Imdb,
                        @Genero,
                        @Elenco,
                        @Idioma,
                        @Qualidade,
                        @Duracao,
                        @AnoLancamento,
                        @Video,
                        @Audio,
                        @Sinopse,
                        @Trailler,
                        @ImagemCapa,
                        @Categoria,
                        @DataPublicacao
                    )  ";

                    command.Parameters.AddWithValue("@Titulo", filme.Titulo);
                    command.Parameters.AddWithValue("@Imdb", filme.Imdb);
                    command.Parameters.AddWithValue("@Genero", filme.Genero);
                    command.Parameters.AddWithValue("@Elenco", filme.Elenco);
                    command.Parameters.AddWithValue("@Idioma", filme.Idioma);
                    command.Parameters.AddWithValue("@Qualidade", filme.Qualidade);
                    command.Parameters.AddWithValue("@Duracao", filme.Duracao);
                    command.Parameters.AddWithValue("@AnoLancamento", filme.AnoLancamento);
                    command.Parameters.AddWithValue("@Video", filme.Video);
                    command.Parameters.AddWithValue("@Audio", filme.Audio);
                    command.Parameters.AddWithValue("@Sinopse", filme.Sinopse);
                    command.Parameters.AddWithValue("@Trailler", filme.Trailler);
                    command.Parameters.AddWithValue("@ImagemCapa", filme.ImagemCapa);
                    command.Parameters.AddWithValue("@Categoria", filme.Categoria);
                    command.Parameters.AddWithValue("@DataPublicacao", filme.DataPublicacao);

                    int rowCount = command.ExecuteNonQuery();
                    filme.Id = Convert.ToInt32(command.LastInsertedId);
                    Console.WriteLine(
                        String.Format("Cadastrado: {0} - {1}", filme.Id, filme.Titulo)
                    );
                }
            }

            Console.WriteLine("Fim da sincronização");

            return filme.Id;
        }

        public void InsertLink(LinkDownload linkDownload)
        {
            var builder = Conexao();
            
            using (var conn = new MySqlConnection(builder.ConnectionString))
            {
                Console.WriteLine("Iniciando insert link");
                conn.Open();

                using (var command = conn.CreateCommand())
                {
                    command.CommandText =
                        @"INSERT INTO LinkDownload (
                        IdFilme,
                        Titulo,
                        Url,
                        UrlFake,
                        Idioma,
                        Qualidade,
                        Tamanho
                    ) VALUES (
                        @IdFilme,
                        @Titulo,
                        @Url,
                        @UrlFake,
                        @Idioma,
                        @Qualidade,
                        @Tamanho
                    ) ";

                    command.Parameters.AddWithValue("@IdFilme", linkDownload.IdFilme);
                    command.Parameters.AddWithValue("@Titulo", linkDownload.Titulo);
                    command.Parameters.AddWithValue("@Url", linkDownload.Url);
                    command.Parameters.AddWithValue("@UrlFake", linkDownload.UrlFake);
                    command.Parameters.AddWithValue("@Idioma", linkDownload.Idioma);
                    command.Parameters.AddWithValue("@Qualidade", linkDownload.Qualidade);
                    command.Parameters.AddWithValue("@Tamanho", linkDownload.Tamanho);

                    int rowCount = command.ExecuteNonQuery();
                    linkDownload.Id = Convert.ToInt32(command.LastInsertedId);
                    Console.WriteLine(
                        String.Format("Link: {0} - {1}", linkDownload.Id, linkDownload.Titulo)
                    );
                }
            }
            Console.WriteLine("Fim da sincronização de links");
        }
    }
}
