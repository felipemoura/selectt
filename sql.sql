DROP TABLE IF EXISTS `dbo`.`user`; 

CREATE TABLE `dbo`.`user` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `FULLNAME` VARCHAR(255) NOT NULL,
  `EMAIL` VARCHAR(80) NOT NULL,
  `PASSWORD` VARCHAR(255) NOT NULL,
  `USERNAME` VARCHAR(45) NOT NULL,
  `INSTITUTION` VARCHAR(255) NULL,
  `ISADMIN` BIT(1) NOT NULL DEFAULT 0,
  `STATUS` BIT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  UNIQUE INDEX `USERNAME_UNIQUE` (`USERNAME` ASC));

INSERT INTO `dbo`.`user` (`ID`, `FULLNAME`, `EMAIL`, `PASSWORD`, `USERNAME`, `INSTITUTION`, `ISADMIN`, `STATUS`) 
VALUES ('1', 'Felipe Moreira Moura', 'felpemoura@usp.br', '7e04da88cbb8cc933c7b89fbfe121cca', 'felipe', 'USP', '0', '0');


DROP TABLE IF EXISTS `dbo`.`caracterization`; 

CREATE TABLE `dbo`.`caracterization` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(700) NOT NULL,
  `Year` INT NOT NULL,
  `BibliograficReference` VARCHAR(5000) NULL,
  `PDF_File` VARCHAR(1024) NULL,
  `DevelopmentParadigm` VARCHAR(1024) NULL,
  `SoftwareExecutionPlatform` VARCHAR(1024) NULL,
  `SoftwareLanguage` VARCHAR(1024) NULL,
  `TypeofTestingTechnique` VARCHAR(1024) NULL,
  `TestingLevel` VARCHAR(1024) NULL,
  `Approach` VARCHAR(1024) NULL,
  `TestCaseGenerationCriteria` VARCHAR(1024) NULL,
  `InputsRequired` VARCHAR(1024) NULL,
  `ResultsGenerated` VARCHAR(1024) NULL,
  `FailuresRevealed` VARCHAR(1024) NULL,
  `QualityAttributes` VARCHAR(1024) NULL,
  `ConcurrentBugPattern` VARCHAR(5000) NULL,
  `GraphicalRepresentation` VARCHAR(1024) NULL,
  `Typeofanalysis` VARCHAR(1024) NULL,
  `Paradigm` VARCHAR(1024) NULL,
  `MechanismOfReplay` VARCHAR(1024) NULL,
  `Instrumentation` VARCHAR(1024) NULL,
  `StateSpace` VARCHAR(1024) NULL,
  `Tool` VARCHAR(1024) NULL,
  `ToolRefCatalog` VARCHAR(1024) NULL,
  `AutomationLevel` VARCHAR(1024) NULL,
  `PlatformOperation` VARCHAR(1024) NULL,
  `ToolCost` VARCHAR(1024) NULL,
  `NeedApproval` BIT(1) NOT NULL DEFAULT 1,


  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `TITLE_UNIQUE` (`Title` ASC) )

  ENGINE=InnoDB CHARACTER SET latin1;


-- Registers
INSERT INTO `dbo`.`caracterization` (`ID`, `Title`, `Year`, `BibliograficReference`, `PDF_File`, `DevelopmentParadigm`, `SoftwareExecutionPlatform`, `SoftwareLanguage`, `TypeofTestingTechnique`, `TestingLevel`, `Approach`, `TestCaseGenerationCriteria`, `InputsRequired`, `ResultsGenerated`, `FailuresRevealed`, `QualityAttributes`, `ConcurrentBugPattern`, `GraphicalRepresentation`, `Typeofanalysis`, `Paradigm`, `MechanismofReplay`, `Instrumentation`, `StateSpace`, `Tool`, `ToolRefCatalog`, `AutomationLevel`, `PlatformOperation`, `ToolCost`, `NeedApproval`)
VALUES (1,'A Modular Approach to Model-based Testing of Concurrent Programs',2013,'"@Inbook{1,author=""Carver, Richardand Lei, Yu"",editor=""Louren{\c{c}}o, Jo{\~a}o M.and Farchi, E7chapter=""A Modular Approach to Model-Based Testing of Concurrent Programs"",title=""Multicore Software Engineering, Performance, and Tools: International Conference, C11 2013, St. Petersburg, Russia, August 19-20, 2013. Proceedings"",year=""2013"",publisher=""Springer Berlin Heidelberg"",address=""Berlin, Heidelberg"",pages=""85--96"",isbn=""978-3-642-39955-8"",doi=""10.1007/978-3-642-39955-8_8"",url=""http://dx.doi.org/10.1007/978-3-642-39955-8_8""}"','','concurrent programs','','Java','Model based testing','','LTS MODELS','','LTS model','partially-ordered sequences, totally-ordered sequences, modular sequences','programming errors','effectiveness','','abstract LTS model ','dynamic','message passing','Deterministic execution','no','incremental reachability analysis and new ATL reduction algoritm','N','N','very low','','N',0);

INSERT INTO `dbo`.`caracterization` (`ID`, `Title`, `Year`, `BibliograficReference`, `PDF_File`, `DevelopmentParadigm`, `SoftwareExecutionPlatform`, `SoftwareLanguage`, `TypeofTestingTechnique`, `TestingLevel`, `Approach`, `TestCaseGenerationCriteria`, `InputsRequired`, `ResultsGenerated`, `FailuresRevealed`, `QualityAttributes`, `ConcurrentBugPattern`, `GraphicalRepresentation`, `Typeofanalysis`, `Paradigm`, `MechanismofReplay`, `Instrumentation`, `StateSpace`, `Tool`, `ToolRefCatalog`, `AutomationLevel`, `PlatformOperation`, `ToolCost`, `NeedApproval`)
VALUES (2,'An Empirical Evaluation of the Cost and Effectiveness of Structural Testing Criteria for Concurrent Programs',2013,'"@inproceedings{2,  added-at = {2013-06-05T00:00:00.000+0200},  author = {Brito, Maria A. S. and do Rocio Senger de Souza, Simone and de Souza, Paulo Sergio Lopes},  biburl = {http://www.bibsonomy.org/bibtex/21935ffea5917ab7825789e25d985a931/dblp},  booktitle = {ICCS},  crossref = {conf/iccS/2013},  editor = {Alexandrov, Vassil N. and Lees, Michael and Krzhizhanovskaya, Valeria V. and Dongarra, Jack and Sloot, Peter M. A.},  ee = {http://dx.doi.org/10.1016/j.procs.2013.05.188},  interhash = {},  intrahash = {1935ffea5917ab7825789e25d985a931},  keywords = {dblp},  pages = {250-259},  publisher = {Elsevier},  series = {Procedia Computer Science},  timestamp = {2015-06-18T11:52:32.000+0200},  title = {An Empirical Evaluation of the Cost and Effectiveness of Structural Testing Criteria for Concurrent Programs.},  url = {http://dblp.uni-trier.de/db/conf/iccS/iccS2013.html#BritoSS13},  volume = 18,  year = 2013}"','','concurrent applications','GNU/Linux','C, MPI','Structural testing','unit','control and data flow criteria','control flow, data flow, comunication flow, message-passing','concurrent code in MPI','"cost: number of test cases to cover a criterion, strength: probability to satisfy a testing criterion using a test set adequate to anothertesting criterion, effectiveness: percentage of defects detected"','incorrect loop, selection structure, incorrect process in messages, source process changed by process in messages, incorrect size of array, non initialized variable, incorrect data types, incorrect size of message, incorrect message address, incorrect type of parameter, incorrect message data type, replacement bloking by non-blocking message, change operator in the variable definition, incorrect dta sent or received, change of the logical operator in predicative statements, missing statements, incorrect variable definition, increment/decrement of variable in messages.','effectiveness, cost, strength','"incorrect loop or selection structure, incorrect process in messages, source process changed by ""any"" processin messages, incorrect size of array, non initialized variable, incorrect data types, incorrect size of message, incorrect message address, incorrect type of parameter, incorrect message data type, replacement blocking by non-blocking message, change of operator in the variable definition, incorrect data sent or received, change of the logical operator in predicative statements, missing statement, incorrect variable definition, increment/decrement of variables in messages"','Parallel Control Flow Graph (PCFG)','dynamic','message passing','controlled execution','check-point insertion','structural testing criteria','ValiMPI','103','medium','GNU/Linux','academic',0);

INSERT INTO `dbo`.`caracterization` (`ID`, `Title`, `Year`, `BibliograficReference`, `PDF_File`, `DevelopmentParadigm`, `SoftwareExecutionPlatform`, `SoftwareLanguage`, `TypeofTestingTechnique`, `TestingLevel`, `Approach`, `TestCaseGenerationCriteria`, `InputsRequired`, `ResultsGenerated`, `FailuresRevealed`, `QualityAttributes`, `ConcurrentBugPattern`, `GraphicalRepresentation`, `Typeofanalysis`, `Paradigm`, `MechanismofReplay`, `Instrumentation`, `StateSpace`, `Tool`, `ToolRefCatalog`, `AutomationLevel`, `PlatformOperation`, `ToolCost`, `NeedApproval`)
VALUES (3,'BALLERINA: automatic generation and clustering of efficient random unit tests for multithreaded code',2012,'"@inproceedings{3, author = {Nistor, Adrian and Luo, Qingzhou and Pradel, Michael and Gross, Thomas R. and Marinov, Darko}, title = {BALLERINA: Automatic Generation and Clustering of Efficient Random Unit Tests for Multithreaded Code}, booktitle = {Proceedings of the 34th International Conference on Software Engineering}, series = {ICSE \'12}, year = {2012}, isbn = {978-1-4673-1067-3}, location = {Zurich, Switzerland}, pages = {727--737}, numpages = {11}, url = {http://dl.acm.org/citation.cfm?id=2337223.2337309}, acmid = {2337309}, publisher = {IEEE Press}, address = {Piscataway, NJ, USA},}"','','','','Java','Randon testing','unit','clustering, bug detection','automated random generation of efficient multighread unit test code','multithread code class, specification of the class','number of transitions','code bugs, oracle violations','effectiveness','bug-triggering interleavings, deadlock, exception, starvation','','dynamic','message passing','linearizability','','clustering faults','Ballerina','N','high','','academic',0);

-- ID  
-- Title 
-- Year  
-- BibliograficReference  
-- PDF file  
-- Development paradigm  
-- Software execution platform 
-- Software Language 
-- Type of Testing technique - Family  
-- Testing level 
-- Approach (Technique name) 
-- Test case generation criteria 
-- Inputs required 
-- Results generated/Response variable 
-- Failures revealed 
-- Quality attributes  
-- Concurrent bug pattern  
-- Representation of concurrent program/Graphical representation 
-- Type of analysis  
-- Paradigm for process interaction  
-- Mechanism of Replay/Non-deterministic/Deterministic-execution 
-- Instrumentation 
-- State space explosion problem 
-- Tool  
-- Tool Ref Catalog  
-- Automation level  
-- Platform that the tool operate  
-- Tool cost