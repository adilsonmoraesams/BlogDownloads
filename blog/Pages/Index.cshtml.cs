using blog.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using Microsoft.EntityFrameworkCore;

namespace blog.Pages;

public class IndexModel : PageModel
{
    private readonly Data.BlogDbContext _context; 
    public IList<Filme>? Filmes { get; set; }

    public async Task OnGetAsync()
    {
        Filmes = await _context.Filmes.ToListAsync();
    }

    public IndexModel(Data.BlogDbContext context)
    {
        _context = context;
    }

     
}
