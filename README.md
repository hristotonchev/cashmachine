-- Application for making money transfer 

-- Money transfer options : 
- Cash Transfer
- Credit Card Transfer 
- Bank Transfer 

Logic for Money source transaction is located in app/CustomClass

Interface - app/CustomClass/Transaction.php is implemented in all Money Source
classes to force population of mandatory data 

Blades views are implemented for the three types of transactions 

Class app/CustomClass/CashMachine.php is responsible to trigger the custom money source
classes and init them with app/Factory/TransactionFactory.php . The CashMachine class is 
also responsible to trigger validation upon transaction and store the data in the database

app/Models/Transaction.php model is implemented to handle the data that comes from CashMachine
migration for the model can be found in database/migrations/2022_05_23_183644_create_transaction_table.php

Two simple types of tests are written - respectfully located in:
- tests/Feature/RouteValidationTest.php
- tests/Unit/CashMachineTest.php
