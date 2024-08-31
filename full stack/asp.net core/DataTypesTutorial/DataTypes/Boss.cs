using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DataTypes
{
    internal class Boss : Employee
    {
        public Boss(int employeeId, string employeeName, String address, double salary, int companyId, string companyName, string location) :base(employeeId,employeeName,address,salary,companyId,companyName,location)
        {
            
        }
    }
}
