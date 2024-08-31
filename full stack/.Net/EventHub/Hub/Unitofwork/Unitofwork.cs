using Hub.Data;
using Hub.Repository;
using Hub.Repository.IRepository;

namespace Hub.Unitofwork
{
    public class Unitofwork : IUnitofwork
    {
        private readonly ApplicationDbContext _dbContext;
        public Unitofwork(ApplicationDbContext dbContext)
        {
            _dbContext = dbContext;
            Company = new CompanyRepository(_dbContext);
        }
        public IcompanyRepository Company  {get; private set;}

       
        public void Dispose()
        {
            _dbContext.Dispose();
        }

        public void Save()
        {
            _dbContext.SaveChanges();
        }
    }
}
