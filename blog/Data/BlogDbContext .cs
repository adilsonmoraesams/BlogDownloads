using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using blog.Models;
using Microsoft.EntityFrameworkCore;

namespace blog.Data
{
    public class BlogDbContext : DbContext
    {
        public BlogDbContext(DbContextOptions<BlogDbContext> options)
           : base(options)
        {
        }

        public DbSet<Filme> Filmes => Set<Filme>();
        public DbSet<LinkDownload> LinkDownloads => Set<LinkDownload>();

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        { 
            modelBuilder.Entity<Filme>()
                .HasMany(e => e.LinkDownloads)
                .WithOne(e => e.Filme)
                .HasForeignKey(e => e.IdFilme)
                .HasPrincipalKey(e => e.Id);
        }
    }
}