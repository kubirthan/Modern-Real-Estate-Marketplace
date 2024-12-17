using Microsoft.EntityFrameworkCore;
using PhoneShopServer.Data;
using PhoneShopSharedlibarary.Contracts;
using PhoneShopSharedlibarary.Models;
using PhoneShopSharedlibarary.Responses;

namespace PhoneShopServer.Repositories
{
    public class ProductRepository : IProduct
    {
        private readonly AppDbContext appDbContext;
        public ProductRepository(AppDbContext appDbContext)
        {
            this.appDbContext = appDbContext;
        }

        public async Task<ServiceResponse> AddProduct(Product model)
        {
            if (model is null) return new ServiceResponse(false, "model is null");
            var (flag, message) = await CheckName(model.Name!);
            if (flag)
            {
                appDbContext.Products.Add(model);
                await Commit();
                return new ServiceResponse(true, "Product Saved");
            }
            return new ServiceResponse(flag, message);
        }

        public override bool Equals(object? obj)
        {
            return obj is ProductRepository repository &&
                   EqualityComparer<AppDbContext>.Default.Equals(appDbContext, repository.appDbContext);
        }

        public async Task<List<Product>> GetAllProducts(bool featuredProducts)
        {
            if(featuredProducts)
                return await appDbContext.Products.Where(_ => _.Featured).ToListAsync();
            else
                return await appDbContext.Products.ToListAsync();
        }

        private async Task<ServiceResponse> CheckName(string name)
        {
            var product = await appDbContext.Products.FirstOrDefaultAsync(x=> x.Name.ToLower()!.Equals(name.ToLower()));
            return product is null ? new ServiceResponse(true, null!) : new ServiceResponse(false, "Product already exist");
        }

        private async Task Commit() => await appDbContext.SaveChangesAsync();
    }
}
