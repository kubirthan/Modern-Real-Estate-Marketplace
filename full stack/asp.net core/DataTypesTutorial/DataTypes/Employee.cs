using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DataTypes
{
    internal class Employee : Company,IEmployeeSalary
    {
        public int EmployeeId { get; set; }
        public string EmployeeName { get; set; }
        public string Address { get; set; }

        public double Salary { get; set; }

        public Employee(int employeeId , string employeeName , String address, double salary, int companyId , string companyName , string location) : base(companyId , companyName , location)
        {
            EmployeeId = employeeId ;
            EmployeeName = employeeName ;
            Address = address ;
            Salary = salary ;
        }

        public void EmployeeDetails()
        {
            Console.WriteLine($"Employee Name:{EmployeeName} and Address:{Address}");
        }
        public void EmployeeCompanyDetails()
        {
            Console.WriteLine($"Employee Name:{EmployeeName} - company Name:{CompanyName} and location:{Location}");
        }

        public void SalaryDetails()
        {
            Console.WriteLine($"Salary:{Salary}");
        }
    }
}
