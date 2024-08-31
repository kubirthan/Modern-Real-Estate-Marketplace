using Hub.Repository.IRepository;

namespace Hub.Unitofwork
{
    public interface IUnitofwork : IDisposable
    {
        IcompanyRepository Company {  get; }

        void Save();
    }
}
