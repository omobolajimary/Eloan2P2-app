exports.allAccess = (req, res) => {
    res.status(200).send("Public Content.");
  };
  
  exports.userBoard = (req, res) => {
    res.status(200).send("User Content.");
  };
  
  exports.adminBoard = (req, res) => {
    res.status(200).send("Admin Content.");
  };
  
  exports.creditorBoard = (req, res) => {
    res.status(200).send("Creditor Content.");
  };

  exports.borrowersBoard = (req, res) => {
    res.status(200).send("Borrowers Content.");
  };

  exports.loanHistory = (req, res) => {
    res.status(200).send("Borrowers Loan History.");
  };


  