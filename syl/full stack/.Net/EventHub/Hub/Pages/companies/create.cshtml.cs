using Hub.Data;
using Hub.Model;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

namespace Hub.Pages.companies
{
    [BindProperties]
    public class createModel : PageModel
    {
        private readonly ApplicationDbContext _dbContext;

        public createModel(ApplicationDbContext dbContext)
        {
            _dbContext = dbContext;
        }

        public Company Company { get; set; }
        public void OnGet()
        {
        }

        public async Task<IActionResult> OnPost()
        {
            if (ModelState.IsValid)
            {
                _dbContext.Companies.Add(Company);
                _dbContext.SaveChanges();

                return RedirectToPage("Index");
            }

            return Page();
        }
    }
}
