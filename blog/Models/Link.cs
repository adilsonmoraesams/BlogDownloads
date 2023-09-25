using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using Microsoft.EntityFrameworkCore;

namespace blog.Models
{
    public class LinkDownload
    {
        [Key]
        public int Id { get; set; }
        public int IdFilme { get; set; }
        public string? Url { get; set; }
        public string? UrlFake { get; set; }

        public string? Idioma { get; set; }
        public string? Qualidade { get; set; }
        public string? Tamanho { get; set; }


        public virtual Filme? Filme { get; set; }

        // public void LinkDownload(string _url, string _urlFake, string _idioma, string _qualidade, string _tamanho)
        // {
        //     Url = _url;
        //     UrlFake = _urlFake;
        //     Idioma = _idioma;
        //     Qualidade = _qualidade;
        //     Tamanho = _tamanho;
        // }
    }
}