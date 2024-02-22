

using System.ComponentModel.DataAnnotations;
using scrap.Models;

namespace Models;

class Filme
{
    [Key]
    public int Id { get; set; }
    public string? Titulo { get; set; }
    public string? Link { get; set; }
    public DateTime DataPublicacao { get; set; }

    public string? Imdb { get; set; }

    public string? Genero { get; set; }

    public string? Elenco { get; set; }

    public string? Idioma { get; set; }
    public string? Tamanho { get; set; }
    public string? Classificacao { get; set; }
    public string? Qualidade { get; set; }
    public string? Formato { get; set; }
    public string? Duracao { get; set; }

    public string? AnoLancamento { get; set; }

    public string? Video { get; set; }
    public string? Audio { get; set; }

    public string? Sinopse { get; set; }

    public string? Trailler { get; set; }

    public string? ImagemCapa { get; set; }
    public string? Categoria { get; set; }

    public ICollection<LinkDownload>? LinkDownloads { get; set; }
}