using learnnApi.Models;
using Microsoft.EntityFrameworkCore;

namespace learnnApi.Data
{
    public class ApplicationDbContext : DbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options)
        {
            
        }

        public DbSet<Country> countries { get; set; }
    }
}
