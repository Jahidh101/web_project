using MFCS.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace MFCS.Controllers
{
    public class RegisterController : Controller
    {
        MFCSEntities context = new MFCSEntities();

        public ActionResult BuyProducts()
        {

            return View();
        }
        public ActionResult FarmerList()
        {
            var f = context.Users.ToList();
            var fa = from e in f
                     where e.Type == "Farmer"
                     select e;
            return View(fa);
        }
        public ActionResult BuyerList()
        {
            var f = context.Users.ToList();
            var fa = from e in f
                     where e.Type =="Buyer"
                     select e;
            return View(fa);
        }
        public ActionResult BuyingHistory()
        {
            var h = context.Buy_Products.ToList();
            
            return View(h);
        }
        public ActionResult SellingHistory()
        {
            var h = context.Sell_Products.ToList();

            return View(h);
        }
        
        public ActionResult AddProduct()
        {
            return View();
        }
        [HttpPost]
        public ActionResult AddProduct(Buy_Products p)
        {
            Product pr = new Product();
            var types = context.Product_Type.ToList();
            var t = from e in types
                    where e.Title == p.Type
                    select e.Id;
            context.Buy_Products.Add(p);
            context.SaveChanges();

            return RedirectToAction("BuyingHistory");
        }
    }
}