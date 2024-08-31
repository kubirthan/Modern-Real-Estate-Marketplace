using Hub.Data;
using Hub.Model;
using Hub.Unitofwork;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace Hub.Pages.companies
{
    public class IndexModel : PageModel
    {
        private readonly IUnitofwork _unitofwork;

        public IndexModel(IUnitofwork unitofwork)
        {
            _unitofwork = unitofwork;
        }

        public IEnumerable<Company> companies { get; set; }
        public void OnGet()
        {
            companies = _unitofwork.Company.GetAll();
        }
    }
}
