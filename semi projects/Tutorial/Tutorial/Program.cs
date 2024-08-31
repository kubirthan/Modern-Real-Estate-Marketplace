using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Tutorial
{
    internal class Program
    {
        static void Main(string[] args)
        {
            List<Comapny> companies = new List<Comapny>
            {
                new Comapny
                {
                    Id = 1,
                    Name = "Test",
                    Location = "india"
                },
                new Comapny
                {
                    Id=2,
                    Name = "Test2",
                    Location = "uk"
                },
                new Comapny
                {
                    Id= 3,
                    Name = "Test3",
                    Location = "usa"
                }
                
                
            };

            foreach (var item in companies)
            {
                Console.WriteLine(item.Name);
            }
        }
    }
}
