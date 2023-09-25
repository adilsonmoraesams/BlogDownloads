using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.SignalR;

namespace blog.Models
{
    public class Filme
    {
        public int Id { get; set; }

        [Required, StringLength(255)]
        public string? Titulo { get; set; }

        [Required, StringLength(255)]
        public string? TituloOriginal { get; set; }

        [Required]
        public string? Url { get; set; }

        [Required]
        public double? Imdb { get; set; }

        [Required, StringLength(100)]
        public string Genero { get; set; }

        public string? Direcao { get; set; }

        public string? Idioma { get; set; }
        public string? Qualidade { get; set; }
        public double? Duracao { get; set; }

        public int? AnoLancamento { get; set; }

        public int? Video { get; set; }
        public int? Audio { get; set; }

        public string? Sinopse { get; set; }

        public string? Trailler { get; set; }


        public DateTime DtStart { get; set; }


        public ICollection<LinkDownload>? LinkDownloads { get; set; }
    }
}