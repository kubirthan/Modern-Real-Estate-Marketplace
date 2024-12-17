using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml.Linq;

namespace Tutorial
{
    public class Comapny
    {
        //members
        public int Id { get; set; } 

        public string Name { get; set; } 
        public string Location { get; set; }

        public Comapny()
        {
            
        }
        public Comapny(int id, string name, string location)
        {
            this.Id = id;
            this.Name = name;
            this.Location = location;

        }
        public void DisplayCompanyDetails()
        {
            Console.WriteLine($"Id:{Id} and name:{Name} and Location: {Location}");
        }

    }
}
