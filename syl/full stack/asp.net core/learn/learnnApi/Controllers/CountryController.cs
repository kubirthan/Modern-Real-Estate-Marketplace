using AutoMapper;
using learnnApi.Data;
using learnnApi.DTO;
using learnnApi.Models;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace learnnApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CountryController : ControllerBase
    {
        private readonly ApplicationDbContext _dbContext;
        private readonly IMapper _mapper;

        public CountryController(ApplicationDbContext dbContext, IMapper mapper)
        {
              _dbContext = dbContext;
              _mapper = mapper;
        }

        [HttpGet]
        [ProducesResponseType(StatusCodes.Status200OK)]
        [ProducesResponseType(StatusCodes.Status204NoContent)]
        public ActionResult<IEnumerable<CountryDto>> GetAll() 
        {
            var countries = _dbContext.countries.ToList();

            var countriesDto = _mapper.Map<CountryDto>(countries);

            if(countries == null)
            {
                return NoContent();
            }

            return Ok(countriesDto);
        }

        [HttpGet("{id:int}")]
        [ProducesResponseType(StatusCodes.Status204NoContent)]
        [ProducesResponseType(StatusCodes.Status200OK)]
        public ActionResult<CountryDto> GetById(int id)
        {
            var country = _dbContext.countries.Find(id);

            var countryDto = _mapper.Map<CountryDto>(country);

            if (country == null)
            {
                return NoContent();
            }

            return Ok(countryDto);
        }

        [HttpPost]
        [ProducesResponseType(StatusCodes.Status201Created)]
        [ProducesResponseType(StatusCodes.Status409Conflict)]
        public ActionResult<CreateCountryDto> Create([FromBody] CreateCountryDto countryDto)
        {
            var result = _dbContext.countries.AsQueryable().Where(x=>x.Name.ToLower().Trim() == countryDto.Name.ToLower().Trim()).Any();

            if(result)
            {
                return Conflict("Country already exists in database");
            }

            var country = _mapper.Map<Country>(countryDto);

            _dbContext.countries.Add(country);
            _dbContext.SaveChanges();
            return CreatedAtAction("GetById", new { id = country.Id} ,country);
        }

        [HttpPut("{id:int}")]
        [ProducesResponseType(StatusCodes.Status400BadRequest)]
        [ProducesResponseType(StatusCodes.Status204NoContent)]
        [ProducesResponseType(StatusCodes.Status404NotFound)]
        public ActionResult<Country> Update(int id ,[FromBody]Country country)
        {
            if(country == null || id != country.Id)
            {
                return BadRequest();
            }

            var countryFromDb = _dbContext.countries.Find(id);

            if (countryFromDb == null)
            {
                return NotFound();
            }

            countryFromDb.Name = country.Name;
            countryFromDb.ShortName = country.ShortName;
            countryFromDb.CountryCode = country.CountryCode;

            _dbContext.countries.Update(countryFromDb);
            _dbContext.SaveChanges();
            return NoContent();
        }

        [HttpDelete("{id:int}")]
        [ProducesResponseType(StatusCodes.Status204NoContent)]
        [ProducesResponseType(StatusCodes.Status404NotFound)]
        public ActionResult DeleteById(int id)
        {
            if(id == 0)
            {
                return BadRequest();
            }

            var country = _dbContext.countries.Find(id);

            if(country == null)
            {
                return NotFound();
            }


            
            _dbContext.countries.Remove(country);
            _dbContext.SaveChanges();
            return NoContent();
        }
    }
}
