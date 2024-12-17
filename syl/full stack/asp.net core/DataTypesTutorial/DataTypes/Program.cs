namespace DataTypes
{
    class Program
    {
        static void Main(string[] ags)
        {
            Employee googleEmployee = new Employee(12,"kubi","lk",12000,1,"Google","India");
            googleEmployee.DisplayCompanyDetails();
            googleEmployee.EmployeeCompanyDetails();
            googleEmployee.EmployeeDetails();



            googleEmployee.SalaryDetails();


            Boss obj = new Boss(13,"sob","singapore",23000,3,"amazon","london");
            obj.DisplayCompanyDetails();
            obj.EmployeeCompanyDetails();
            obj.EmployeeDetails();
            obj.SalaryDetails();


        }
    }
}
