/// <reference types="Cypress" />

//Checking the console for errors
let windowConsoleError;
Cypress.on('window:before:load', (win) => {
  windowConsoleError = cy.spy(win.console, 'error');
})
let failEarly = false;
afterEach(() => {
  expect(windowConsoleError).to.not.be.called;
  if (failEarly) throw new Error("Failing Early due to an API or other module configuration problem. If running on CI, please check Cypress VIDEOS/SCREENSHOTS in the Artifacts for more details.")
})
afterEach(function() {
  if (this.currentTest.state === "failed") failEarly = true
});
describe('PS8 CloudSync tests', () => {
  beforeEach(() => {
      cy.viewport(1920,1080)
      cy.CachingBOFOPS8()
  })
it('C2885757: Checking if the CloudSync UI is appearing in the module', () => {
    cy.OpeningModuleDashboardURL()
    cy.CloudSyncUI()
})
it('C2885758: Checking if the PS Accounts / Popup UI is appearing in the module', () => {
    cy.OpeningModuleDashboardURL()
    cy.PsAccountsUI()
});
})
