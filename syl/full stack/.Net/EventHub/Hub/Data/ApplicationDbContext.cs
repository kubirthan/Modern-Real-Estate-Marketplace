using Hub.Model;
using Microsoft.EntityFrameworkCore;

namespace Hub.Data
{
    public class ApplicationDbContext : DbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> dbContext) : base(dbContext)
        {
            
        }

        public DbSet<Company> Companies { get; set; }
    }
}
