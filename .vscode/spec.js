it("should trigger the click action when typing {enter}", () => {
  cy.visit("index.html");
  cy.get("button").type("{enter}");
  cy.get("output").should("contain", "Clicked!");
});
