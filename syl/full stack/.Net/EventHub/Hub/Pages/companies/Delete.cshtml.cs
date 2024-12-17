using Hub.Data;
using Hub.Model;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace Hub.Pages.companies
{
    [BindProperties]
    public class DeleteModel : PageModel
    {
        private readonly ApplicationDbContext _dbContext;

        public DeleteModel(ApplicationDbContext dbContext)
        {
            _dbContext = dbContext;
        }

        public Company Company { get; set; }
        public void OnGet(int Id)
        {
            Company = _dbContext.Companies.FirstOrDefault(x => x.id == Id);
        }

        public async Task<IActionResult> OnPost()
        {
            var objFromDb = _dbContext.Companies.FirstOrDefault(x=>x.id == Company.id);

            if(objFromDb != null)
            {
                _dbContext.Remove(objFromDb);
                _dbContext.SaveChanges();

                return RedirectToPage("Index");
            }

            return Page();
        }
    }
}
