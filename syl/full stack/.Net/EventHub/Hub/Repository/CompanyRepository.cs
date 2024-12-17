using Hub.Data;
using Hub.Model;
using Hub.Repository.IRepository;

namespace Hub.Repository
{
    public class CompanyRepository : Repository<Company>, IcompanyRepository
    {
        private readonly ApplicationDbContext _dbContext;

        public CompanyRepository(ApplicationDbContext dbContext) : base(dbContext)
        {
            _dbContext = dbContext;
        }
        public void Update(Company company)
        {
            var objFromDB = _dbContext.Companies.FirstOrDefault(x=>x.id == company.id);
            if (objFromDB != null)
            {
                objFromDB.Name = company.Name;
                objFromDB.Location = company.Location;

            }
        }
    }
}
