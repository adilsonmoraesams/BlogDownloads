using blog.Data;
using blog.Models;
using Microsoft.EntityFrameworkCore;
var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
builder.Services.AddRazorPages();

builder.Services.AddDbContext<BlogDbContext>(options =>
    options.UseInMemoryDatabase("BlogDb"));

var app = builder.Build();
AddCustomerData(app);

// Configure the HTTP request pipeline.
if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Error");
    // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
    app.UseHsts();
}

app.UseHttpsRedirection();
app.UseStaticFiles();

app.UseRouting();

app.UseAuthorization();

app.MapRazorPages();

app.Run();




static void AddCustomerData(WebApplication app)
{
    var scope = app.Services.CreateScope();
    var _dbContext = scope.ServiceProvider.GetService<BlogDbContext>();

    Filme filme = new Filme
    {
        Titulo = "Noite Sangrenta",
        TituloOriginal = "Fear the Night",
        Url = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhUa4m9TAR7DIF56fq9TMzWcciPjjoRycTruDhqfWI25br9JjZgU5NwfW2f_l9EPLl-oJ_4xL4DWiWJ45bbiXohcN_Djh2Tn5yymP38zGA7_HAhoUSrEEHkCti2Y0HJ3aUmHoq9HvRbOw41a__bCIt6EXmRI5esPJizhaIVmAGsIr3X_78CGR59__jIToJ0/s375/kgND5yAax4aT4UXEXrEsZavlHDx.jpg",
        Imdb = 4.6,
        Genero = "Suspense",
        Direcao = "Neil LaBute",
        Idioma = "Legendado",
        Qualidade = "1080p",
        AnoLancamento = 2023,
        Audio = 10,
        Video = 10,
        DtStart = DateTime.Now,
        Sinopse = "Do nosso eterno adolescente Seth Rogen, uma nova geração de heróis vai surgir… diretamente do esgoto.",
        Trailler = @"<iframe width='582' height='410' src='https://www.youtube.com/embed/1QZNSrMTBSM' title='Fear the Night Trailer #1 (2023)' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>",
        LinkDownloads = new List<LinkDownload>{
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL 2160p [4K]", Idioma = "Dublado", Tamanho = "17.85 GB "},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL 2160p [4K]", Idioma = "Dublado", Tamanho = "17.85 GB "},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL [1080p]", Idioma = "Legendado", Tamanho = "1.91 GB"},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL [1080p]", Idioma = "Legendado", Tamanho = "1.91 GB"}
        }
    };
    var customer1 = filme;

    var customer2 = new Filme
    {
        Titulo = "O Primeiro Tiro : A Lenda de Wyatt Earp",
        TituloOriginal = "Noite Sangrenta",
        Url = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhpCxCuJs6Xf4tM0CVTmaUAZHhecyeQnEY41kZ9QHCofmPVk8CIJGeNFz0pZ7AR66MBUhoimEUVLIfFuHvqSmpnV7x9nfTeTLEHkrYks938q7nN3T2A3L8A0tM2zhOY_EJzA6aRNg4qpnaY3M5ZucT1-PWgwdZfmYZBYORrPL4nN8PYYN19lqmxtQFywESF/s375/ljv0GaDP1BDt8HbxTMlU6ylnoaJ.jpg",
        Imdb = 5.0,
        Genero = "Suspense",
        Direcao = "Neil LaBute",
        Idioma = "Legendado",
        Qualidade = "1080p",
        AnoLancamento = 2023,
        Audio = 10,
        Video = 10,
        DtStart = DateTime.Now,
        Sinopse = "Do nosso eterno adolescente Seth Rogen, uma nova geração de heróis vai surgir… diretamente do esgoto.",
        Trailler = @"<iframe width='582' height='410' src='https://www.youtube.com/embed/1QZNSrMTBSM' title='Fear the Night Trailer #1 (2023)' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>",
        LinkDownloads = new List<LinkDownload>{
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL 2160p [4K]", Idioma = "Dublado", Tamanho = "17.85 GB "},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL 2160p [4K]", Idioma = "Dublado", Tamanho = "17.85 GB "},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL [1080p]", Idioma = "Legendado", Tamanho = "1.91 GB"},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL [1080p]", Idioma = "Legendado", Tamanho = "1.91 GB"}
        }
    };

    var customer3 = new Filme
    {
        Titulo = "Besouro Azul",
        TituloOriginal = "Noite Sangrenta",
        Url = "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhdKZ5Yi9lXXMK6_EXKdPnRiJvqY4JwB8ILu2n3Klo8OcThR4ITzK5hTk-DuATvp1x1CQFTfi1OufG0y6c-oKOARF0X8NwAyDCZFHnMbDwdnoRXrIuv8ZOh9BvwVHTu5cf3puh1RYOfsNddlKHOLIsnPrqcyOwhRp76AGcm15S_muylefTrrM_aoKa079UN/s375/gA6sEygZlszxZZZTR5jD9rfleZO-250x375.jpg",
        Imdb = 7.0,
        Genero = "Suspense",
        Direcao = "Neil LaBute",
        Idioma = "Legendado",
        Qualidade = "1080p",
        AnoLancamento = 2023,
        Audio = 10,
        Video = 10,
        DtStart = DateTime.Now,
        Sinopse = "Do nosso eterno adolescente Seth Rogen, uma nova geração de heróis vai surgir… diretamente do esgoto.",
        Trailler = @"<iframe width='582' height='410' src='https://www.youtube.com/embed/1QZNSrMTBSM' title='Fear the Night Trailer #1 (2023)' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>",
        LinkDownloads = new List<LinkDownload>{
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL 2160p [4K]", Idioma = "Dublado", Tamanho = "17.85 GB "},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL 2160p [4K]", Idioma = "Dublado", Tamanho = "17.85 GB "},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL [1080p]", Idioma = "Legendado", Tamanho = "1.91 GB"},
            new LinkDownload{ Url = "https://google.com", UrlFake = "https://google.com", Qualidade = "WEB-DL [1080p]", Idioma = "Legendado", Tamanho = "1.91 GB"}
        }
    };

    if (_dbContext != null)
    {
        _dbContext.Filmes.Add(customer1);
        _dbContext.Filmes.Add(customer2);
        _dbContext.Filmes.Add(customer3);

        _dbContext.SaveChanges();
    }
}
