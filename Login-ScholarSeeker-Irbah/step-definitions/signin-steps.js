module.exports = function(){
    this.Given(/^user browse signin page$/, function () {
        helpers.loadPage('http://localhost/ScholarSeeker/Landing/login')
      });
    this.Given(/^user fill email field$/, function () {
        driver.then(function(){
            return page.fieldEmail.performFill();
        })
      });
    this.Given(/^user fill password$/, function () {
        driver.then(function(){
            return page.fieldpw.performFill();
        })
      });
    this.When(/^user click button sign in$/, function () {
        driver.then(function(){
            return page.signinBtn.performClick();
        })
      });
     
    this.Then(/^user can see home scholarseeker$/, function () {
        // helpers.loadPage('http://localhost/ScholarSeeker/Landing')
        return driver.findElements(by.xpath("//h1[normalize-space()='welcome to scholarseeker']"))

        .then(function(elements){
            expect(elements.length).to.not.equal(0);
        })
      });   
}