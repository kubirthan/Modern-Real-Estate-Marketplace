using AutoMapper;
using learnnApi.DTO;
using learnnApi.Models;

namespace learnnApi.common
{
    public class MappingProfile : Profile
    {
        public MappingProfile()
        {
            //source, destination
            CreateMap<Country, CreateCountryDto>().ReverseMap();
            CreateMap<Country, CountryDto>().ReverseMap();
        }
    }
}
