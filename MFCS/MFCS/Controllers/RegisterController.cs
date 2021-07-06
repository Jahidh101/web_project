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
        MFCSEntities2 context = new MFCSEntities2();
        public ActionResult AddFarmerBuyer()
        {
            return View();
        }
        [HttpPost]
        public ActionResult AddFarmerBuyer(User p)
        {
            context.Users.Add(p);
            context.SaveChanges();
            if(p.Type == "Farmer")
               return RedirectToAction("FarmerList");
            else
                return RedirectToAction("BuyerList");
        }
        
        public ActionResult FarmerList()
        {
            var f = context.Users.ToList();
            var fa = from e in f
                     where e.Type == "Farmer"
                     select e;
            return View(fa);
        }
        public ActionResult EditFarmerProfile(int id)
        {
            var h = from p in context.Users
                    where p.Id == id
                    select p;
            var h1 = h.FirstOrDefault();
            return View(h1);
        }
        [HttpPost]
        public ActionResult EditFarmerProfile(User u)
        {
            var h = context.Users.FirstOrDefault(e => e.Id == u.Id);
            context.Entry(h).CurrentValues.SetValues(u);
            context.SaveChanges();
            return RedirectToAction("FarmerList");
        }
        public ActionResult BuyerList()
        {
            var f = context.Users.ToList();
            var fa = from e in f
                     where e.Type =="Buyer"
                     select e;
            return View(fa);
        }
        public ActionResult EditBuyerProfile(int id)
        {
            var h = from p in context.Users
                    where p.Id == id
                    select p;
            var h1 = h.FirstOrDefault();
            return View(h1);
        }
        [HttpPost]
        public ActionResult EditBuyerProfile(User u)
        {
            var h = context.Users.FirstOrDefault(e => e.Id == u.Id);
            context.Entry(h).CurrentValues.SetValues(u);
            context.SaveChanges();
            return RedirectToAction("BuyerList");
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
        
        

        //farmer
        public ActionResult AddComplain()
        {
            return View();
        }
        [HttpPost]
        public ActionResult AddComplain(Complain c)
        {
            context.Complains.Add(c);
            context.SaveChanges();
            return View();
        }
        public ActionResult FarmerSellingHistory()
        {
            var h = context.Buy_Products.ToList();
            var h1 = from p in h
                     where p.User_Id == 1
                     select p;

            return View(h1);
        }
        public ActionResult ViewProfile()
        {
            var h = from p in context.Users
                    where p.Id == 1
                    select p;
            var h1 = h.FirstOrDefault();
            return View(h1);
        }
        public ActionResult EditProfile()
        {
            
            var h = from p in context.Users
                     where p.Id == 1
                     select p;
            var h1 = h.FirstOrDefault();
            return View(h1);
        }
        [HttpPost]
        public ActionResult EditProfile(User u)
        {
            var h = context.Users.FirstOrDefault(e => e.Id == 1);
            context.Entry(h).CurrentValues.SetValues(u);
            context.SaveChanges();
            return RedirectToAction("ViewProfile");
        }
    }
}