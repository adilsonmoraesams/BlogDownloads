using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using blog.Models;
using blog.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Microsoft.EntityFrameworkCore;

namespace blog.Pages
{
    public class Detalhes : PageModel
    {

        private readonly int limitFilmesMesmoGenero = 3;


        #region Coleções
        public Filme? Filme { get; set; }
        public IList<Filme>? FilmesMesmoGenero { get; set; }
        #endregion Coleções

        #region Contexto e Contrutor
        private readonly BlogDbContext _context;
        public Detalhes(BlogDbContext context)
        {
            _context = context;
        }
        #endregion Contexto e Contrutor

        public async Task<IActionResult> OnGetAsync(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            Filme = await _context.Filmes.FirstOrDefaultAsync(m => m.Id == id);

            if (Filme == null)
            {
                return NotFound();
            }

            this.ListMesmoGereno(Filme);

            return Page();
        }

        public void ListMesmoGereno(Filme filme)
        {
            FilmesMesmoGenero = _context.Filmes
                .Where(m => m.Genero.ToUpper().Contains(filme.Genero.ToUpper()))
                .OrderBy(x => Guid.NewGuid()).Take(this.limitFilmesMesmoGenero).ToList();
        }
    }
}