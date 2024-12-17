using PhoneShopSharedlibarary.Models;
using PhoneShopSharedlibarary.Responses;

namespace PhoneShopSharedlibarary.Contracts
{
    public interface IProduct
    {
        Task<ServiceResponse> AddProduct(Product model);
        Task<List<Product>> GetAllProducts(bool featuredProducts);
    }
}
