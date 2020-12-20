# ./features/signin.feature

Feature: signup on the website
    As a user
    I want to be able to signup

    @success
    Scenario: User success to signup on the website
        Given user browse signup page
        And user fill email field
        And user fill username field
        And user fill password
        And user fill confirm
        And user choose mahasiswa radiobutton
        When user click button sign up
        Then user can see signin page with success message