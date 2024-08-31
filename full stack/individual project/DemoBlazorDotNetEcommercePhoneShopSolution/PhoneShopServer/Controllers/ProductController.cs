using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.VisualBasic;
using PhoneShopSharedlibarary.Contracts;
using PhoneShopSharedlibarary.Models;
using PhoneShopSharedlibarary.Responses;

namespace PhoneShopServer.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ProductController(IProduct productService) : ControllerBase
    {
       

        [HttpGet]
        public async Task<ActionResult<List<Product>>> GetAllProducts(bool featured)
        {
            var Products = await productService.GetAllProducts(featured); return Ok(Products);
        }

        [HttpPost]
        public async Task<ActionResult<ServiceResponse>> AddProduct(Product model)
        {
            if (model is null) return BadRequest("Model is null");
            var response = await productService.AddProduct(model);
            return Ok(response);
        }
    }
}
