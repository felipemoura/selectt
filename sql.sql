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
  `CREATED` DATETIME NOT NULL DEFAULT NOW(),
  `LASTLOGIN` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC),
  UNIQUE INDEX `USERNAME_UNIQUE` (`USERNAME` ASC));

INSERT INTO `dbo`.`user` (`ID`, `FULLNAME`, `EMAIL`, `PASSWORD`, `USERNAME`, `INSTITUTION`, `ISADMIN`, `STATUS`) 
VALUES ('1', 'Felipe Moreira Moura', 'felpemoura@usp.br', '7e04da88cbb8cc933c7b89fbfe121cca', 'felipe', 'USP', '1', '1');

INSERT INTO `dbo`.`user` (`ID`, `FULLNAME`, `EMAIL`, `PASSWORD`, `USERNAME`, `INSTITUTION`, `STATUS`) 
VALUES ('2', 'Teste Testinho', 'teste@usp.br', '698dc19d489c4e4db73e28a713eab07b', 'teste', 'USP', '1');

DROP TABLE IF EXISTS `dbo`.`selectt_sessions` ; 

CREATE TABLE `dbo`.`selectt_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `selectt_sessions_timestamp` (`timestamp`)
);

DROP TABLE IF EXISTS `dbo`.`caracterization`; 

CREATE TABLE `dbo`.`caracterization` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(700) NOT NULL,
  `Year` INT NOT NULL,
  `BibliograficReference` VARCHAR(5000) NULL,
  `TechniqueLink` VARCHAR(1024) NULL,
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
  `ConcurrentBugPattern` VARCHAR(1024) NULL,
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
INSERT INTO `dbo`.`caracterization` (`ID`, `Title`, `Year`, `BibliograficReference`, `TechniqueLink`, `DevelopmentParadigm`, `SoftwareExecutionPlatform`, `SoftwareLanguage`, `TypeofTestingTechnique`, `TestingLevel`, `Approach`, `TestCaseGenerationCriteria`, `InputsRequired`, `ResultsGenerated`, `FailuresRevealed`, `QualityAttributes`, `ConcurrentBugPattern`, `GraphicalRepresentation`, `Typeofanalysis`, `Paradigm`, `MechanismofReplay`, `Instrumentation`, `StateSpace`, `Tool`, `ToolRefCatalog`, `AutomationLevel`, `PlatformOperation`, `ToolCost`, `NeedApproval`)
VALUES (1,'A Modular Approach to Model-based Testing of Concurrent Programs',2013,'"@Inbook{1,author=""Carver, Richardand Lei, Yu"",editor=""Louren{\c{c}}o, Jo{\~a}o M.and Farchi, E7chapter=""A Modular Approach to Model-Based Testing of Concurrent Programs"",title=""Multicore Software Engineering, Performance, and Tools: International Conference, C11 2013, St. Petersburg, Russia, August 19-20, 2013. Proceedings"",year=""2013"",publisher=""Springer Berlin Heidelberg"",address=""Berlin, Heidelberg"",pages=""85--96"",isbn=""978-3-642-39955-8"",doi=""10.1007/978-3-642-39955-8_8"",url=""dx.doi.org/10.1007/978-3-642-39955-8_8""}"','No Information','concurrent programs','No Information','Java','Model based testing','No Information','LTS MODELS','No Information','LTS model','partially-ordered sequences, totally-ordered sequences, modular sequences','programming errors','effectiveness','No Information','abstract LTS model ','dynamic','message passing','Deterministic execution','no','incremental reachability analysis and new ATL reduction algoritm','N','N','very low','No Information','N',0);

INSERT INTO `dbo`.`caracterization` (`ID`, `Title`, `Year`, `BibliograficReference`, `TechniqueLink`, `DevelopmentParadigm`, `SoftwareExecutionPlatform`, `SoftwareLanguage`, `TypeofTestingTechnique`, `TestingLevel`, `Approach`, `TestCaseGenerationCriteria`, `InputsRequired`, `ResultsGenerated`, `FailuresRevealed`, `QualityAttributes`, `ConcurrentBugPattern`, `GraphicalRepresentation`, `Typeofanalysis`, `Paradigm`, `MechanismofReplay`, `Instrumentation`, `StateSpace`, `Tool`, `ToolRefCatalog`, `AutomationLevel`, `PlatformOperation`, `ToolCost`, `NeedApproval`)
VALUES (2,'An Empirical Evaluation of the Cost and Effectiveness of Structural Testing Criteria for Concurrent Programs',2013,'"@inproceedings{2,  added-at = {2013-06-05T00:00:00.000+0200},  author = {Brito, Maria A. S. and do Rocio Senger de Souza, Simone and de Souza, Paulo Sergio Lopes},  biburl = {www.bibsonomy.org/bibtex/21935ffea5917ab7825789e25d985a931/dblp},  booktitle = {ICCS},  crossref = {conf/iccS/2013},  editor = {Alexandrov, Vassil N. and Lees, Michael and Krzhizhanovskaya, Valeria V. and Dongarra, Jack and Sloot, Peter M. A.},  ee = {dx.doi.org/10.1016/j.procs.2013.05.188},  interhash = {},  intrahash = {1935ffea5917ab7825789e25d985a931},  keywords = {dblp},  pages = {250-259},  publisher = {Elsevier},  series = {Procedia Computer Science},  timestamp = {2015-06-18T11:52:32.000+0200},  title = {An Empirical Evaluation of the Cost and Effectiveness of Structural Testing Criteria for Concurrent Programs.},  url = {dblp.uni-trier.de/db/conf/iccS/iccS2013.html#BritoSS13},  volume = 18,  year = 2013}"','No Information','concurrent applications','GNU/Linux','C, MPI','Structural testing','unit','control and data flow criteria','control flow, data flow, comunication flow, message-passing','concurrent code in MPI','"cost: number of test cases to cover a criterion, strength: probability to satisfy a testing criterion using a test set adequate to anothertesting criterion, effectiveness: percentage of defects detected"','incorrect loop, selection structure, incorrect process in messages, source process changed by process in messages, incorrect size of array, non initialized variable, incorrect data types, incorrect size of message, incorrect message address, incorrect type of parameter, incorrect message data type, replacement bloking by non-blocking message, change operator in the variable definition, incorrect dta sent or received, change of the logical operator in predicative statements, missing statements, incorrect variable definition, increment/decrement of variable in messages.','effectiveness, cost, strength','"incorrect loop or selection structure, incorrect process in messages, source process changed by ""any"" processin messages, incorrect size of array, non initialized variable, incorrect data types, incorrect size of message, incorrect message address, incorrect type of parameter, incorrect message data type, replacement blocking by non-blocking message, change of operator in the variable definition, incorrect data sent or received, change of the logical operator in predicative statements, missing statement, incorrect variable definition, increment/decrement of variables in messages"','Parallel Control Flow Graph (PCFG)','dynamic','message passing','controlled execution','check-point insertion','structural testing criteria','ValiMPI','103','medium','GNU/Linux','academic',0);

INSERT INTO `dbo`.`caracterization` (`ID`, `Title`, `Year`, `BibliograficReference`, `TechniqueLink`, `DevelopmentParadigm`, `SoftwareExecutionPlatform`, `SoftwareLanguage`, `TypeofTestingTechnique`, `TestingLevel`, `Approach`, `TestCaseGenerationCriteria`, `InputsRequired`, `ResultsGenerated`, `FailuresRevealed`, `QualityAttributes`, `ConcurrentBugPattern`, `GraphicalRepresentation`, `Typeofanalysis`, `Paradigm`, `MechanismofReplay`, `Instrumentation`, `StateSpace`, `Tool`, `ToolRefCatalog`, `AutomationLevel`, `PlatformOperation`, `ToolCost`, `NeedApproval`)
VALUES (3,'BALLERINA: automatic generation and clustering of efficient random unit tests for multithreaded code',2012,'"@inproceedings{3, author = {Nistor, Adrian and Luo, Qingzhou and Pradel, Michael and Gross, Thomas R. and Marinov, Darko}, title = {BALLERINA: Automatic Generation and Clustering of Efficient Random Unit Tests for Multithreaded Code}, booktitle = {Proceedings of the 34th International Conference on Software Engineering}, series = {ICSE \'12}, year = {2012}, isbn = {978-1-4673-1067-3}, location = {Zurich, Switzerland}, pages = {727--737}, numpages = {11}, url = {dl.acm.org/citation.cfm?id=2337223.2337309}, acmid = {2337309}, publisher = {IEEE Press}, address = {Piscataway, NJ, USA},}"','No Information','No Information','No Information','Java','Randon testing','unit','clustering, bug detection','automated random generation of efficient multighread unit test code','multithread code class, specification of the class','number of transitions','code bugs, oracle violations','effectiveness','bug-triggering interleavings, deadlock, exception, starvation','No Information','dynamic','message passing','linearizability','No Information','clustering faults','Ballerina','N','high','No Information','academic',0);


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



DROP TABLE IF EXISTS `dbo`.`techniques`; 

CREATE TABLE `dbo`.`techniques` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(500) NOT NULL,
  `Reference` VARCHAR(1024) NULL,
  `Technique` VARCHAR(1024) NULL,
  `Approach` VARCHAR(1024) NULL,
  `Typeofanalysis` VARCHAR(1024) NULL,
  `Paradigm` VARCHAR(1024) NULL,
  `Language` VARCHAR(1024) NULL,
  `ConcurrentBug` VARCHAR(1024) NULL,
  `SupportingTool` VARCHAR(1024) NULL,
  `Evidence` VARCHAR(1024) NULL,


  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `TITLE_UNIQUE` (`Title` ASC) )

  ENGINE=InnoDB CHARACTER SET latin1;

-- Title,  
-- Reference,  
-- Technique,  
-- Approach, 
-- Type of nalysis,  
-- Paradigm, 
-- Language, 
-- Concurrent bugs,  
-- Supporting tool,  
-- Evidence

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A Modular Approach to Model-based Testing of Concurrent Programs','dl.acm.org/citation.cfm?id=2951642','Model based testing','LTS MODELS','Dynamic','Message passing','Java','Specific bugs','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('An Empirical Evaluation of the Cost and Effectiveness of Structural Testing Criteria for Concurrent Programs','www.sciencedirect.com/science/article/pii/S1877050913003311','Structural testing','Control and data flow criteria','Dynamic','Message passing','C, MPI','Mutation based errors','ValiMPI','Quasi-experiment');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('BALLERINA: automatic generation and clustering of efficient random unit tests for multithreaded code','ieeexplore.ieee.org/document/6227145/','Randon testing','Clustering','Dynamic','Message passing','Java','Bug-triggering interleavings, deadlock, exception, starvation','Ballerina','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('CARISMA: a context-sensitive approach to race-condition sample-instance selection for multithreaded applications.','dl.acm.org/citation.cfm?id=2336780','Random testing','Context sensitive','Dynamic','Shared memory','Java','Data race','Carisma','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Comparative assessment of testing and model checking using program mutation. ','ieeexplore.ieee.org/document/4344126/','Mutation testing','mutation operators','Dynamic','Shared memory','Java','Assertion violation, deadlock','ConMan','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Efficient mutation testing of multithreaded code','onlinelibrary.wiley.com/doi/10.1002/stvr.1469/pdf','Mutation testing','Efficient exploration','Dynamic','Shared memory','Java','Atomicity violation, dataraces, deadlock','MutMut','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Generating effective tests for concurrent programs via AI automated planning techniques','link.springer.com/article/10.1007/s10009-013-0277-y','Search based testing','AI planning','Static/Dynamic','Shared memory','Java','Data race, atomicity violations, null-pointer dereferences','Penelope','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Generating unit tests for concurrent classes','dl.acm.org/citation.cfm?id=2511595','Search based testing','GA algorithm','Static/Dynamic','Shared memory','Java','Data race, deadlock','ConSuite, EvoSuite','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('How Good is Static Analysis at Finding Concurrency Bugs?','ieeexplore.ieee.org/document/5601822/ ','Detecting concurrency errors','Static analysis','Static','Shared memory/Message passing','Java','Data race, deadlock, starvation, bug patterns in FindBugs','FindBugs, Jlint, Chord','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Location pairs: a test coverage metric for shared-memory concurrent programs','link.springer.com/article/10.1007/s10664-011-9166-8','Structural testing','Location Pair (LP)','Static/Dynamic','Shared memory','Java','High-level concurrency erros, atomicity, refinement violations','Monitoring tool, JavaPathfinder','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('The Impact of Concurrent Coverage Metrics on Testing Effectiveness','dl.acm.org/citation.cfm?id=2511604&CFID=905291509','Structural testing','Coverage metric','Dynamic','Shared memory','Java','Mutation based errors','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A Lightweight and Portable Approach to Making Concurrent Failures Reproducible','dl.acm.org/citation.cfm?id=2128593','Deterministic execution','Replay-based','Static','Shared memory','Java','Deadlock, data race, atomicity violation','Concrash','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('An approach to testing commercial embedded systems','dl.acm.org/citation.cfm?id=2566087','structural testing','Coverage-adequate criteria ','Dynamic','Shared memory','C','N','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('An Automation-Assisted Empirical Study on Lock Usage for Concurrent Programs','ieeexplore.ieee.org/document/6676881/','Deterministic execution','Synchronization coverage','Static','Shared memory','Java','Data race, deadlock','Lupa','Quasi-experiment');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('An empirical study of data race detector tools','ieeexplore.ieee.org/document/6561640/ ','Detecting concurrency errors','Data race detection','Static/Dynamic','Shared memory','Java','Data race','RaceFuzzer, RacerAJ, JCHORD, RCC, JRF','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Are concurrency coverage metrics effective for testing: a comprehensive empirical investigation','dl.acm.org/citation.cfm?id=2858634','Structural testing','Coverage metrics','Dynamic','Shared memory','Java','Mutation based errors','PCT, Ctrigger ','Quasi-experiment');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('ASP: Abstraction Subspace Partitioning for Detection of Atomicity Violations with an Empirical Study','ieeexplore.ieee.org/document/7059243/','Detecting concurrency errors','Partition-based','Dynamic','Shared memory','Java','Atomicity violation','Maple','Controlled experiment');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Assertion Guided Symbolic Execution of Multithreaded Programs','dl.acm.org/authorize?N92766','Slicing testing','DPOR','Static/Dynamic','Shared memory','C/C++','N','Cloud9','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Automated Classification of Data Races Under Both Strong and Weak Memory Models','dl.acm.org/citation.cfm?id=2734118','Detecting concurrency errors','Data race detection','Dynamic','Shared memory','C/C++','Data race (specification violated, output differs, k-witness harmless, single ordering)','Portend+','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Clash of the Titans: Tools and techniques for hunting bugs in concurrent programs ','dl.acm.org/citation.cfm?id=1639631','Random testing','Randomized depth-first search','N','Shared memory','java, C#','Hunting bugs (data race, deadlock, atomicity violation)','CalFuzzer, ConTest, CHESS, Java Pathafinder (JPF)','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Concurrency Testing Using Schedule Bounding: an Empirical Study','dl.acm.org/citation.cfm?id=2555260','Formal method-based testing','Schedule bounding ','Dynamic','Shared memory','C/C++/Java','Deadlock, crashes, assertion failures, data race','Maple','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('ConLock: A Constraint-based Approach to Dynamic Checking on Deadlocks in Multithreaded Programs','dl.acm.org/citation.cfm?id=2568312','Model based testing','constraint based','Dynamic','Shared memory','C/C++/Java','Deadlock','MagicFuzzer','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Detecting Event Anomalies in Event-based Systems','dl.acm.org/citation.cfm?id=2786836','Detecting concurrency errors','Event-based interaction','Static','Shared memory','Java','Data race','DEvA','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Effective random testing of concurrent programs','dl.acm.org/citation.cfm?id=1321679','Random testing','Random partial order sampling','Dynamic','Shared memory','Java','Deadlocks, data-races, assertion violations','CalFuzzer','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Empirical evaluation of a new composite approach to the coverage criteria and reachability testing of concurrent programs','onlinelibrary.wiley.com/doi/10.1002/stvr.1568/abstract','Reachability testing','Composite approach','Static/Dynamic','Message passing','C/MPI','Mutation based errors','ValiMPI','Quasi-experiment');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Incremental integration testing of concurrent programs','ieeexplore.ieee.org/iel5/32/21774/01010062.pdf','Structural testing','ALTS-based coverage criteria','Static/Dynamic','Message passing','CCS, CSP, Ada','Interface-level synchronization','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Learning from mistakes: a comprehensive study on real world concurrency bug characteristics.','dl.acm.org/citation.cfm?id=1346323','Detecting concurrency errors','Transactional memory','N','Shared memory','C/C++','Atomicity violation, order violation','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('RACEZ : A Lightweight and Non-Invasive Race Detection Tool for Production Applications','ieeexplore.ieee.org/document/6032479/ ','Detecting concurrency errors','Dynamic data race detection','Static','Shared memory','C/C++','Data race','Racez','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('RECONTEST: Effective Regression Testing of Concurrent Programs','dl.acm.org/citation.cfm?id=2818787','Regression testing','RECONTEST','Dynamic','Shared memory','Java','Faulty interleaving','Recontest','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Runtime Prevention of Concurrency Related Type-state Violations in Multithreaded Applications','dl.acm.org/citation.cfm?id=2610405','Detecting concurrency errors','Prevention of low level bugs','Dynamic','Shared memory','C/C++/Pthreads','Type-state violations','LLVM framework','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Saturation-based testing of concurrent programs','dl.acm.org/citation.cfm?id=1595706','Structural testing','Saturation-based','N','N','Java','N','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Selective mutation testing for concurrent code','dl.acm.org/citation.cfm?id=2483773','Mutation testing','Selective mutation','Dynamic','Shared memory','Java','Concurrency bugs','Comutation','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Testing Concurrent Programs on Relaxed Memory Models','dl.acm.org/citation.cfm?id=2001436','Random testing','Active testing','Dynamic','Shared memory','C','Data race','Relaxer ','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Toward a Methodology to Expose Partially Fixed Concurrency Bugs in Modified Multithreaded Programs','dl.acm.org/citation.cfm?id=2666592','Regression testing','Similarity-based active testing','Dynamic','Shared memory','Pthread','Deadlock, data race','RegressionMaple','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Incremental testing of concurrent programs using value schedules','citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.150.1895','Model based testing','Value-schedule-based','Static/Dynamic','Shared memory','Java','Deadlock, data race','JPF','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Efficient Deterministic Multithreading Without Global Barriers','dl.acm.org/citation.cfm?id=2555252','Model based testing','Deterministic lazy release consistency ','Static/Dynamic','Shared memory','C/C++/Pthreads','Data race','RFDet','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Efficient Execution Path Exploration for Detecting Races in Concurrent Programs','www.iaeng.org/IJCS/issues_v40/issue_3/IJCS_40_3_02.pdf','Reachability testing','TPAIR','Dynamic','Shared memory','Java','Data race','AspectJ','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Pegasus: Automatic Barrier Inference for Stable Multithreaded Systems','dl.acm.org/citation.cfm?id=2771813','Deterministic execution','Automatic Barrier Inference','Dynamic','Message passing','C/C++','Bottlenecks','PARROT StableMT','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Race directed random testing of concurrent programs','dl.acm.org/citation.cfm?id=1375584','Randon testing','Randomized dynamic analysis','Dynamic','Shared memory/Message passing','Java','Data race, exeption ','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('SATCheck: SAT-Directed Stateless Model Checking for SC and TSO','dl.acm.org/citation.cfm?id=2814297','Formal method-based testing','Model checking','Dynamic','Shared memory','C','N','SAT','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('TRADE: Precise Dynamic Race Detection for Scalable Transactional Memory Systems','dl.acm.org/ft_gateway.cfm?ftid=1603544&id=2786021','Detecting concurrency errors','Relaxed transactional data race','Dynamic','Shared memory','C/C++','Data race','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A combinatorial testing strategy for concurrent programs','dl.acm.org/citation.cfm?id=1324164','Reachability testing','Synchronization sequences','Dynamic','Message passing','Java','Synchronization','RichTest','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A meta heuristic for effectively detecting concurrency errors','link.springer.com/chapter/10.1007/978-3-642-01702-5_8','Search based testing','Greedy depth-first search','Static','Shared memory','Java','Real errors','Jlint','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A model-free and state-cover testing scheme for semaphore-based and shared-memory concurrent programs','onlinelibrary.wiley.com/doi/10.1002/stvr.1520/abstract','Reachability testing','Dynamic effective testing','Dynamic','Shared memory','Java','Synchronization','JPF','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A platform for search-based testing of concurrent software','dl.acm.org/citation.cfm?id=1866215','Search based testing','Search-base concurrency testing','Static/Dynamic','Shared memory','Java','Synchronization, exeption','ConTest','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A race-detection and flipping algorithm for automated testing of multi-threaded programs','dl.acm.org/citation.cfm?id=1763234','Reachability testing','Concolic testing','Static','Shared memory','Java','Data race, deadlock','jCUTE','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('A randomized scheduler with probabilistic guarantees of finding bugs ','dl.acm.org/citation.cfm?id=1736040','Random testing','Randomized scheduler','N','Shared memory','C/C++','Atomicity violation, deadlock, preemption','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Accurate and Efficient Runtime Detection of Atomicity Errors in Concurrent Programs','dl.acm.org/citation.cfm?id=1122993','detecting concurrency errors','Detect atomicity violation','Dynamic','Shared memory','Java','Atomicity, data race, Serializability','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Advances in noise-based testing of concurrent software','dl.acm.org/citation.cfm?id=2858629','Random testing','Noise-based testing','Dynamic','Shared memory','C/Java','Noise placement problem, noise seeding problem','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('An Efficient and Flexible Deterministic Framework for Multithreaded Programs','ink.springer.com/article/10.1007/s11390-015-1503-8','Deterministic execution','Deterministic multithreading ','Dynamic','Shared memory','Pthread','Data race, synchronization','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('An Evaluation of Data Race Detectors Using Bug Repositories','ieeexplore.ieee.org/document/6644193/','detecting concurrency errors','Data race detection','Static/Dynamic','Shared memory/Message passing','Java','Data race, atomicity, bad optimization','Tomcat, Spring, Eclipse','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('ASN: A Dynamic Barrier-Based Approach to Confirmation of Deadlocks from Warnings for Large-Scale Multithreaded Programs','ieeexplore.ieee.org/iel7/71/6980150/06747310.pdf','detecting concurrency errors','Deadlock detection','Static/Dynamic','Message passing','C/C++/Java','Deadlock','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Automatic testing environment for multi-core embedded software - ATEMES','dl.acm.org/citation.cfm?id=2064371','Structural testing','Coverage based','Dynamic','Shared memory','C/C++','Data race','Intel TBB','Survey');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Bita: Coverage-guided, automatic testing of actor programs','ieeexplore.ieee.org/document/6693072/','Structural testing','Schedule coverage criteria for actor programs','Static/Dynamic','Shared memory/Message passing','Scala','Specific bugs','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('CLAP: Recording Local Executions to Reproduce Concurrency Failures','dl.acm.org/citation.cfm?id=2462167','Detecting concurrency errors','Reproduce concurrent bugs ','Static','Shared memory','C/C++','Data race','LLVM, KLEE 2.9, STP','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Composable Specifications for Structured Shared-Memory Communication','dl.acm.org/citation.cfm?id=1869473','Formal method-based testing','Composable Specifications','Dynamic','Shared memory/Message passing','Java','Specific bugs: code-communication invariants','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Con2Colic Testing','dl.acm.org/citation.cfm?id=2491453','Reachability testing','Con2colic testing','Static','Shared memory','Java','Data race, specific bugs','ConCrest','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('ConcBugAssist: Constraint Solving for Diagnosis and Repair of Concurrency Bugs','dl.acm.org/citation.cfm?id=2771798','Formal method-based testing','Logical constraint based symbolic analysis','Dynamic ','Shared memory','C','Assertion violation, data race, order violation','CBMC, MSUnCore, ConcBugAssist','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Concurrency Debugging with Differential Schedule Projections','dl.acm.org/citation.cfm?id=2737973','Model based testing','SMT solver','Static','Shared memory','C/C++/Java','Data race, atomicy violation, specific bugs: incorrect operation','LLVM, Soot','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Concurrent software verification with states, events, and deadlocks','link.springer.com/article/10.1007/s00165-005-0071-z','Formal method-based testing','Model checking','N','Message passing','C','Deadlock, specific bugs: SO bugs','MAGIC','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('ConMem: Detecting severe concurrency bugs through an effect-oriented approach','doi.org/10.1145/1736020.1736041','Detecting concurrency errors','Effect-oriented approach','Static','Shared memory','C/C++','Concurrency-memory bugs: NULL-pointer- dereference, dangling-pointer, buffer-overflow, uninitialized-read','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('ConSeq: Detecting Concurrency Bugs through Sequential Errors','dl.acm.org/authorize?N91344 ','Detecting concurrency errors','Consequence oriented approach','Dynamic','Shared memory','C/C++','Data race, atomicity violations','PIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Coverage guided systematic concurrency testing','dl.acm.org/citation.cfm?id=1985824','Random testing','Coverage-guided selective search','Dynamic','Shared memory','C/C++/Pthreads','Deadlock, atomicity violation, order violation','Fusion','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Coverage metrics for saturation-based and search-based testing of concurrent software','dl.acm.org/citation.cfm?id=2341635','Search based testing','Coverage metrics','Static/Dynamic','Shared memory','Java','Data race, deadlock, synchronization, atomicity violation','ConTest','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('CTrigger: Exposing atomicity violation bugs from their hiding places','dl.acm.org/citation.cfm?id=1508249','Detecting concurrency errors','Detect atomicity violation','Static','Shared memory','C/C++','Atomicity violation','PIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Distributed reachability testing of concurrent programs','onlinelibrary.wiley.com/doi/10.1002/cpe.1573/abstract','Reachability testing','Interleaving free concurrency','Dynamic','Shared memory/Message passing','Java/Lotus','Synchronization, data race','RichTest','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Effective and Precise Dynamic Detection of Hidden Races for Java Programs','dl.acm.org/citation.cfm?id=2786839 ','Detecting concurrency errors','Detect hidden races','Dynamic','Shared memory','Java','Hidden races, synchronization order','Jikes RVM','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Embedding Semantics of the Single-Producer/Single-Consumer Lock-Free Queue into a Race Detection Tool','dl.acm.org/citation.cfm?id=2883406','Detecting concurrency errors','Data race detection','Dynamic','Shared memory','C/C++/Pthreads','Data race','LLVM','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Enforcer - Efficient failure injection.','link.springer.com/10.1007%2F11813040_28?from=SL','Structural testing','Failure injection','Static/Dynamic','Not informed','Java','Specific bugs','Junit','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Exploiting parallelism in deterministic shared memory multiprocessing','www.sciencedirect.com/science/article/pii/S0743731512000421','Deterministic execution','FPDet deterministic runtime','Dynamic','Shared memory','Java','Data race, concurrency-memory bugs','LLVM','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Finding Atomicity-Violation Bugs through Unserializable Interleaving Testing','ieeexplore.ieee.org/stamp/stamp.jsp?arnumber=5740930','Detecting concurrency errors','Atomicity violation','Static','Shared memory','C/C++','Atomicity violation','PIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Iterative context bounding for systematic testing of multithreaded programs','dl.acm.org/citation.cfm?id=1250785','Formal method-based testing','Model checking','Static','Shared memory/Message passing','C/C++/C#','Data race, synchronization','Zing, Chees','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Kendo: efficient deterministic multithreading in software','dl.acm.org/citation.cfm?id=1508256','Deterministic execution','Deterministic multithreading','Static/Dynamic','Shared memory','Pthread','Data race, deadlocks, atomicity violations, order violations','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Kivati: Fast detection and prevention of atomicity violations','dl.acm.org/citation.cfm?id=1755945','Detecting concurrency errors','Atomicity violation detection','Static','Shared memory','C','Atomicity violation','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Maple: a coverage-driven testing tool for multithreaded programs','dl.acm.org/citation.cfm?id=2384651','Structural testing','Coverage based metrics','Dynamic','Shared memory','C/C++','Data race, atomicity violations, deadlock','PIN, CHEES, PCT','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Maximizing synchronization coverage via controlling thread schedule','ieeexplore.ieee.org/document/5766365/','Random testing','Active scheduling','Dynamic','Shared memory','Pthread','Synchronization','DynInst','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Multicore Acceleration of Priority-Based Schedulers for Concurrency Bug Detection','dl.acm.org/citation.cfm?id=2254128','Random testing','PPCT randomized scheduler','Dynamic','Shared memory','C++','Atomicity violation, deadlock, ordering violation','NeedlePoint, PIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('MultiOtter : Multiprocess Symbolic Execution','/www.cs.umd.edu/~mwh/papers/multiotter.pdf','Model based testing','Symbolic execution','Dynamic','Shared memory','C','Atomicity violation','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Multithreaded Test Synthesis for Deadlock Detection','dl.acm.org/citation.cfm?id=2660238','Detecting concurrency errors','Deadlock detection','Dynamic','Shared memory','Java','Deadlock','OMEN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('On a Technique for Transparently Empowering Classical Compiler Optimizations on Multithreaded Code','dl.acm.org/citation.cfm?id=2220368','Structural testing','Data flow analysis','Static','Shared memory','C/C++','Data race, synchronization','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Race Detection for Android Applications','dl.acm.org/citation.cfm?id=2594311','Detecting concurrency errors','Happens before reasoning','Dynamic','Shared memory','Java','Data race','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Reachability testing of concurrent programs. ','ieeexplore.ieee.org/document/1650214/','Reachability testing','SYN-sequences','Static','Message passing','C++','Data race, synchronization','RichTest','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Runtime analysis of atomicity for multithreaded programs.','ieeexplore.ieee.org/document/1599419/','Detecting concurrency errors','Atomicity violation detection','Dynamic','Shared memory','Java','Atomicity violation','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('SOS: Saving Time in Dynamic Race Detection with Stationary Analysis','dl.acm.org/citation.cfm?id=2048072','Detecting concurrency errors','Data race detection','Dynamic','Shared memory','Java','Data race','Jikes RVM 3.1.0','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Test-Data Generation for Testing Parallel Real-Time Systems','link.springer.com/chapter/10.1007/978-3-319-25945-1_13','Search based testing','Genetic Algorithms','Static','Shared memory','C/Pthread','Specific bugs','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('TM UNIT : A Transactional Memory Unit Testing and Workload Generation Tool','citeseerx.ist.psu.edu/viewdoc/summary?doi=10.1.1.165.6028','Formal method-based testing','Model checking','Static','Shared memory','C','Specific bugs','Valgrind','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Variable and thread bounding for systematic testing of multithreaded programs ','dl.acm.org/citation.cfm?id=2483764','Formal method-based testing','Model checking','Static','Shared memory','Java/C#','Specific bugs','RankChecker, CHESS','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Applications of Model Reuse When Using Estimation of Distribution Algorithms to Test Concurrent Software ','www.ssbse.org/2011/presentations/.../Staunton_EDA.pdf','Model based testing','Model reuse','N','Not informed','LTL','Deadlock, specific bugs','ECJ, HSF-SPIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Value-deterministic Search-based Replay for Android Multithreaded Applications','dl.acm.org/citation.cfm?id=2513279','Search based testing','Value-deterministic search-based replay','N','Shared memory/Message passing','Java','Data race','Dalvik Debug Monitor Server (DDMS)','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('On the Effectiveness of Contracts as Test Oracles in the Detection and Diagnosis of Functional Faults in Concurrent Object-Oriented Software','ieeexplore.ieee.org/document/6857355/','Formal method-based testing','Designing contracts','Dynamic','Message passing','Java','Data race, deadlock','JML toolset','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Types for safe locking: Static race detection for Java','dl.acm.org/citation.cfm?id=1119480','Detecting concurrency errors','Data race detection','Static','Shared memory','Java','Data race','RaceFreeJava','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('AVIO: Detecting atomicity violations via access interleaving invariants','ieeexplore.ieee.org/document/4205121/','Detecting concurrency errors','Atomicity violation detection','Dynamic','Shared memory','C/C++','Atomicity violation','PIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Detection of asynchronous message passing errors using static analysis','link.springer.com/chapter/10.1007/978-3-642-18378-2_3','Detecting concurrency erros','Message passing errors in Erlang','Static','Message passing','Erlang','Synchronization','dialyzer','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('DTAM: Dynamic Taint Analysis of Multi-threaded Programs for Relevancy Malay Ganai. ','dl.acm.org/citation.cfm?id=2393650','Structural testing','DTAM: Dynamic Taint Analysis','Dynamic','Shared memory','C/C++','Data race specific bugs','PIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Efficient concurrency-bug detection across inputs','/www.bibsonomy.org/bibtex/247d84bd5395323414b1f9df9de44b358/gron','Structural testing','Concurrent Function Pairs ','Static','Shared memory','C/C++','Data race, atomicity violations','PIN, LLVM','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Efficient data race detection for distributed memory parallel programs','dl.acm.org/citation.cfm?id=2063452','Random testing','Active testing','Dynamic','Shared memory','C/UPC','Data race','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('InstantCheck: Checking the determinism of parallel programs using on-the-fly incremental hashing','ieeexplore.ieee.org/abstract/document/5695541/','Deterministic execution','On-the-fly incremental hashing','Dynamic','Shared memory','C++','Data race, atomicity violations, deadlock','InstantCheck','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('MuTMuT: Efficient Exploration for Mutation Testing of Multithreaded Code.','dl.acm.org/citation.cfm?id=1828444','Mutation testing','Efficient mutant execution','N','Shared memory','Java','Data race, atomicity violations, deadlock','MutMut','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('SAM: Self-adaptive dynamic analysis for multithreaded programs','link.springer.com/chapter/10.1007/978-3-642-34188-5_12 ','Detecting concurrency errors','Dynamic testing','Dynamic','Shared memory','Java','Data race, atomicity violations','Eclipse JDT','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Sound Predictive Race Detection in Polynomial Time','dl.acm.org/citation.cfm?id=2103702','Detecting concurrency errors','Causally-precedes','Dynamic','Shared memory','Java','Data race','N','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Synchronization identification through on-the-fly test','dl.acm.org/citation.cfm?id=2529823','Deterministic execution','Data race detection','Dynamic','Shared memory','Pthread','Data race, synchronization','PIN','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Synthesizing Racy Tests','dl.acm.org/citation.cfm?id=2737998','Detecting concurrency errors','Data race detection','Dynamic','Shared memory','Java','Data race','RaceFuzzer, Soot','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Synthesizing Tests for Detecting Atomicity Violations','dl.acm.org/authorize?N92605','Detecting concurrency errors','Atomicity violation detection','Dynamic','Shared memory','Java','Atomicity violation','Ctrigger, Soot','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('TransDPOR: A novel dynamic partial-order reduction technique for testing actor programs','dl.acm.org/citation.cfm?id=2366663','Formal method-based testing','Dynamic partial order reduction','Dynamic','Message passing','ActorFoundry','Data race, deadlock','Basset','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Unfolding based automated testing of multithreaded programs','link.springer.com/article/10.1007/s10515-014-0150-6','Reachability testing','Unfolding based testing','Dynamic','Shared memory','Java','Data race, deadlock','unamed prototype java','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Using SPIN for automated debugging of infinite executions of Java programs','www.sciencedirect.com/science/article/pii/S0164121213002641','Formal method-based testing','Model checking, runtime monitoring','Dynamic','Shared memory','Java','Deadlock, specific bugs','Spin, TJT','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Fair stateless model checking','dl.acm.org/citation.cfm?id=1375625','Formal method-based testing','Fair Stateless Model Checking','Static','Shared memory','C++','Deadlock, specific bugs','Chess','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Verification and Coverage of Message Passing Multicore Applications','dl.acm.org/citation.cfm?id=2209296','Structural testing','Predictive analysis','Dynamic','Shared memory/Message passing','MCAPI','Deadlocks, race conditions, violation of temporal assertions','MCAPI','Case study');

INSERT INTO `dbo`.`techniques`
(`Title`,
`Reference`,
`Technique`,
`Approach`,
`Typeofanalysis`,
`Paradigm`,
`Language`,
`ConcurrentBug`,
`SupportingTool`,
`Evidence`)
VALUES ('Preemption sealing for efficient concurrency testing','link.springer.com/chapter/10.1007/978-3-642-12002-2_35','Formal method-based testing','Preemption sealing','Dynamic','Shared memory/Message passing','.Net','Atomicity violations, livelocks, deadlocks','Chess','Case study');


