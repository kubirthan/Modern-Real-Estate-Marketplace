using System.ComponentModel.DataAnnotations;

namespace Hub.Model
{
    public class Company
    {
        [Key]
        public int id { get; set; }

        [Required]
        public String Name { get; set; }

        [Required]
        public String Location { get; set; }
    }
}
