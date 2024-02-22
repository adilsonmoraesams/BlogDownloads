using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using Models;

namespace scrap.Models
{
    public class LinkDownload
    {
        [Key]
        public int Id { get; set; }
        public int IdFilme { get; set; }
        public string? Titulo { get; set; }
        public string? Url { get; set; }
        public string? UrlFake { get; set; }

        public string? Idioma { get; set; }
        public string? Qualidade { get; set; }
        public string? Tamanho { get; set; }
    }
}
