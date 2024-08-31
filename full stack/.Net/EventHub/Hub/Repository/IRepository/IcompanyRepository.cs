using Hub.Model;

namespace Hub.Repository.IRepository
{
    public interface IcompanyRepository : IRepository<Company>
    {
        void Update(Company company);
    }
}
