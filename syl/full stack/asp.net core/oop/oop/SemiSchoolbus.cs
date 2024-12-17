using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace oop
{
    internal class SemiSchoolbus : SemiBus
    {
        public SemiSchoolbus(int wheel) : base(wheel) 
        {
            
        }

        public override void BusDetails()
        {
            Console.WriteLine($"semischoolbus:{Wheel}");
        }
    }
}
