using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DataTypes
{
    internal class Company
    {
        public int CompanyId { get; set; }
        public string CompanyName { get; set; } 

        public string Location { get; set; }

       
      
        public Company(int companyId , string companyName , string location)
        {
            CompanyId = companyId;
            CompanyName = companyName;
            Location = location;
        }

        public void DisplayCompanyDetails()
        {
            Console.WriteLine($"id:{CompanyId} and Name:{CompanyName} and Location:{Location}");
        }

        public void DisplayData()
        {
            Console.WriteLine($"Id:{CompanyId} and name:{CompanyName}");
        }

       
    }
}
