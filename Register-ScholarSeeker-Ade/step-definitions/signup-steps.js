module.exports = function(){
  this.Given(/^user browse signup page$/, function () {
    // Write code here that turns the phrase above into concrete actions
    helpers.loadPage('http://192.168.64.2/ScholarSeeker/Landing/register')
  });

  this.Given(/^user fill email field$/, function () {
    driver.then(function(){
      return page.fieldEmail_Register.performFill();
    })
  });

  this.Given(/^user fill username field$/, function () {
    // Write code here that turns the phrase above into concrete actions
    driver.then(function(){
      return page.userName.performFill();
    })
  });

  this.Given(/^user fill password$/, function () {
    driver.then(function(){
      return page.fieldpw.performFill();
    })
  });

  this.Given(/^user fill confirm$/, function () {
    // Write code here that turns the phrase above into concrete actions
    driver.then(function(){
      return page.fieldpwconfirm.performFill();
    })
  });

  this.Given(/^user choose mahasiswa radiobutton$/, function () {
    // Write code here that turns the phrase above into concrete actions
    driver.then(function(){
      return page.radiobutton.performClick();
    })
  });

  this.When(/^user click button sign up$/, function () {
    // Write code here that turns the phrase above into concrete actions
    driver.then(function(){
      return page.signinBtn.performClick();
    })
  });

  this.Then(/^user can see signin page with success message$/, function () {
    // Write code here that turns the phrase above into concrete actions
    return driver.findElements(by.xpath("//div[@class='login col-sm-12']"))

    .then(function(elements){
      expect(elements.length).to.not.equal(0);
    })
  });
}