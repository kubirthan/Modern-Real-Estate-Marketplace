﻿using System.ComponentModel.DataAnnotations;

namespace learnnApi.DTO
{
    public class CreateCountryDto
    {
        

        [Required]
        public string Name { get; set; }

        [Required]
        [MaxLength(5)]
        public string ShortName { get; set; }

        [Required]
        [MaxLength(10)]
        public string CountryCode { get; set; }
    }
}
