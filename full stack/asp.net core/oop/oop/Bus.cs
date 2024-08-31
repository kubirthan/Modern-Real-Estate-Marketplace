using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace oop
{
    internal class Bus

    {
        public int Wheel { get; set; }

        public Bus(int wheel)
        {
            Wheel = wheel;
        }

        public virtual void BusDetails()
        {
            Console.WriteLine($" bus : {Wheel} Wheels");
        }
    }
}
