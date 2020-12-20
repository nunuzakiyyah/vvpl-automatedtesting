module.exports = function(){
  this.Given(/^user browse home page$/, function () {
    // Write code here that turns the phrase above into concrete actions
    helpers.loadPage('http://localhost/ScholarSeeker/')
  });

  this.Given(/^user click button scholar$/, function () {
    // Write code here that turns the phrase above into concrete actions
    driver.then(function(){
      return page.clickScholar.performClick();
    })
  });

  this.Given(/^user click button read more$/, function () {
    // Write code here that turns the phrase above into concrete actions
    driver.then(function () {
      return page.clickReadMore2.performClick();
    })
  });

  this.When(/^user click scholar Jalur Prestasi Unggulan$/, function () {
    // Write code here that turns the phrase above into concrete actions
    driver.then(function () {
      return page.clickJalur.performClick();
    })
  });
  
  this.Then(/^user can see scholar page$/, function () {
    // Write code here that turns the phrase above into concrete actions
    return driver.findElements(by.xpath("//form[normalize-space()='Jalur Prestasi Unggulan (JPU)']"))

    // .then(function(elements){
    //     expect(elements.length).to.equal(0);
    // })
  });
}