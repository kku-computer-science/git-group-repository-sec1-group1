***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PhD_PATH}    (//h4[contains(text(),'PhD Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PostdocPATH}    (//h4[contains(text(),'Postdoc Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])



***Test Cases***
# Create Application for Research Assistant Success
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard
    ${Welcome_Text}=    Get Text    xpath=/html/body/div/div/div/div/h4
    Should Be Equal As Strings    ${Welcome_Text}    Hello Assoc. Prof. Dr. Ngamnij Arch-int

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Application for ResearchAssistant 
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-06-15    3    • CV    30    per hour    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.    ${EMPTY}    Thailand, Khonkaen(Full Time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th      ${EMPTY}    2025-07-21     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
    ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[2]
    ${Status_Text}=    Get Text    xpath=(//span[contains(@class,'status-badge')])[2]
    ${Created_Time_Text} =    Get Text    xpath=(//span[contains(@class, 'me-3')])[2]
    ${Deadline_Text} =    Get Text    xpath=(//div[@class='deadline-info']/span[contains(text(), 'Deadline:')])[2]
    Should Be Equal As Strings    ${Role_Text}    Research Assistant
    Should Be Equal As Strings    ${Status_Text}    ACTIVE
    Should Be Equal As Strings    ${Created_Time_Text}    Created: Mar 11, 2025
    Should Be Equal As Strings    ${Deadline_Text}    Deadline: Jun 15, 2025
    Sleep    1s

Check Research Assistant Application Detail
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
    Click Element    xpath=(//a[contains(., 'View Details')])[2]
    ${Detail_Role_Text}=    Get Text    xpath=//h3[contains(@class,'text-primary')]
    ${Detail_Group_Text}=    Get Text    xpath=//p[contains(@class,'text-muted')]   
    ${Detail_Status_Text}=    Get Text    xpath=//span[contains(@class,'badge')]
    Should Be Equal As Strings    ${Detail_Role_Text}    Research Assistant Position
    Should Be Equal As Strings    ${Detail_Group_Text}    Research Group: Laboratory, Applied Intelligence and Data Analytics (AIDA)
    Should Be Equal As Strings    ${Detail_Status_Text}    Active
    Verify Input Deadline    Jun 15, 2025
    Verify Input Vacancies    3
    Verify Input Salary    $30    per hour
    Verify Input Location    Thailand, Khonkaen(Full Time)
    Verify Input Job Detail    Research will have to provide an analysis of company/stock data for Equity analysts and aid them in regard to the preparation of data to write up investment decision research papers and clients' requests. Other aspects of research work involve producing financial models, evaluating public information, and gathering any other available forms of data to support the analysts' work.
    Scroll Element Into View    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
    Sleep    1s
    Verify Input Required Documents    • CV
    Verify Input Required Qualifications    • Fresh graduates are also welcome.\n• Bachelor's degree or above graduates in Finance, Economics or Accounting, or a related field.\n• Having Analyst License (CFA, CISA) would be an advantage.\n• Experience in utilizing Excel to build/maintain financial models; An advanced level of Excel proficiency is expected and required.\n• The ability to work under the guidance of mentors and develop fundamental research-driven ideas.\n• A highly competitive self-starter who thrives in a collaborative and fast-paced environment.
    Verify Input Preferred Qualifications    No preferred qualifications specified.
    Scroll Element Into View    xpath=//div[@class='timeline-content'][.//h6[text()='Expected Start']]/p 
    Sleep    1s
    Verify Input Timeline    Jun 15, 2025    Jul 21, 2025    
    Verify Input Process    • Submit application through the online portal\n• Initial screening\n• Interviews
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s
    Verify Input Contact    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th    
    [Teardown]    Close Browser

# Create Application for Ph.D Success
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard
    ${Welcome_Text}=    Get Text    xpath=/html/body/div/div/div/div/h4
    Should Be Equal As Strings    ${Welcome_Text}    Hello Assoc. Prof. Dr. Ngamnij Arch-int


Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Application for Ph.D
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='phd']
    Sleep    1s
    Input Application    ${FORM_PhD_PATH}    2025-05-04    2    • Transcripts\n• a statement of purpose (SOP)\n• GRE\n• TOEFL/IELTS    20,000    per month    • A Ph.D. or master's degree in computer science, artificial intelligence, machine learning, or a related field.\n• Proven track record of AI research, including publications in recognized AI conferences and journals.\n• Strong programming skills in languages commonly used in AI research (e.g., Python, TensorFlow, PyTorch).\n• In-depth knowledge of machine learning algorithms, deep learning, natural language processing, and/or computer vision.\n• Experience with AI frameworks and libraries.\n• Proficiency in data analysis and statistical modeling.\n• Excellent problem-solving and analytical abilities.\n• Strong communication and collaboration skills.    ${EMPTY}    Thailand, Bangkok(Full time)    Assoc. Prof. Ngamnij Arch-int      ngamnij@kku.ac.th    ${EMPTY}    2025-06-16     ${EMPTY}    • Submit application through the online portal\n• Initial screening\n• Interviews    As an AI Researcher, you will play a pivotal role in our organization's efforts to advance the field of artificial intelligence. You will be responsible for conducting research, developing AI models and algorithms, and staying up-to-date with the latest developments in AI and machine learning. Your contributions will drive innovation and help shape our AI strategy.  
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[3]
    ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[3]
    ${Status_Text}=    Get Text    xpath=(//span[contains(@class,'status-badge')])[3]
    ${Created_Time_Text} =    Get Text    xpath=(//span[contains(@class, 'me-3')])[3]
    ${Deadline_Text} =    Get Text    xpath=(//div[@class='deadline-info']/span[contains(text(), 'Deadline:')])[3]
    Should Be Equal As Strings    ${Role_Text}    PhD
    Should Be Equal As Strings    ${Status_Text}    ACTIVE
    Should Be Equal As Strings    ${Created_Time_Text}    Created: Mar 11, 2025
    Should Be Equal As Strings    ${Deadline_Text}    Deadline: May 04, 2025
    Sleep    1s

Check Ph.D. Application Detail
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[3]
    Click Element    xpath=(//a[contains(., 'View Details')])[3]
    ${Detail_Role_Text}=    Get Text    xpath=//h3[contains(@class,'text-primary')]
    ${Detail_Group_Text}=    Get Text    xpath=//p[contains(@class,'text-muted')]   
    ${Detail_Status_Text}=    Get Text    xpath=//span[contains(@class,'badge')]
    Should Be Equal As Strings    ${Detail_Status_Text}    Active
    Should Be Equal As Strings    ${Detail_Role_Text}    PhD Position
    Should Be Equal As Strings    ${Detail_Group_Text}    Research Group: Laboratory, Applied Intelligence and Data Analytics (AIDA)
    Verify Input Deadline    May 04, 2025
    Verify Input Vacancies    2
    Verify Input Salary    $20,000    per month
    Verify Input Location    Thailand, Bangkok(Full time)
    Verify Input Job Detail    As an AI Researcher, you will play a pivotal role in our organization's efforts to advance the field of artificial intelligence. You will be responsible for conducting research, developing AI models and algorithms, and staying up-to-date with the latest developments in AI and machine learning. Your contributions will drive innovation and help shape our AI strategy.
    Scroll Element Into View    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
    Sleep    1s
    Verify Input Required Documents     • Transcripts\n• a statement of purpose (SOP)\n• GRE\n• TOEFL/IELTS
    Verify Input Required Qualifications    • A Ph.D. or master's degree in computer science, artificial intelligence, machine learning, or a related field.\n• Proven track record of AI research, including publications in recognized AI conferences and journals.\n• Strong programming skills in languages commonly used in AI research (e.g., Python, TensorFlow, PyTorch).\n• In-depth knowledge of machine learning algorithms, deep learning, natural language processing, and/or computer vision.\n• Experience with AI frameworks and libraries.\n• Proficiency in data analysis and statistical modeling.\n• Excellent problem-solving and analytical abilities.\n• Strong communication and collaboration skills.
    Verify Input Preferred Qualifications    No preferred qualifications specified.
    Scroll Element Into View    xpath=//div[contains(@class, 'col-md-4')][contains(., 'Contact Person:')]
    Sleep    1s
    Verify Input Timeline    May 04, 2025    Jun 16, 2025
    Verify Input Process    • Submit application through the online portal\n• Initial screening\n• Interviews
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s
    Verify Input Contact    Assoc. Prof. Ngamnij Arch-int      ngamnij@kku.ac.th    
    # Click Element    xpath=//a[contains(text(), 'Logout')]
    [Teardown]    Close Browser

# Create Application for Postdoc Success
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th  
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard
    ${Welcome_Text}=    Get Text    xpath=/html/body/div/div/div/div/h4
    Should Be Equal As Strings    ${Welcome_Text}    Hello Assoc. Prof. Dr. Ngamnij Arch-int


Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Application for Postdoc
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='postdoc']
    Sleep    1s
    Input Application    ${FORM_PostDoc_PATH}    2025-05-04    3    • A Cover Letter\n• Full CV: academic and employment history, degrees obtained, scholarships and awards, post-doctoral and clinical/ residency training (where applicable), other study and research opportunities, Name of PhD supervisor, etc.\n• A research statement (max of 3 pages) of major accomplishments in research, citing up to five research, citing up to five significant publications, creative work or other scholarly contribution, and explaining their significance. Including sample copies, complete list of publication and impact, and evidence of international visibility.\n• A Teaching Statement that focuses on evidence of student learning and educational leadership (if applicable). A preface (maximum 300 words) that makes the case for your appointment. This should be highly distilled summary of your key contributions to student learning and educational leadership, guided by your teaching philosophy.\n• Scanned copies of academic certificates and transcripts\n• A list of FOUR Referees (including one from the applicant's PhD or post-doctoral advisor/supervisor).    61,000    per year    Successful candidates must hold a PhD in a discipline closely related to data visualization and analytics by date of appointment, with evidence of interdisciplinary research applying computational methods to the social sciences. This includes but is not limited to social science disciplines (sociology, political science, communication, economics etc.) or computer science and related disciplines (information science, data science, computational physics etc.)    • Experience that demonstrates a strong publication record.\n• Demonstrated ability or potential to mentor research of undergraduate and graduate students.\n• Demonstrated ability or potential to engage in professional and institutional service and leadership.\n• Evidence of ability to work with diverse student, faculty, and staff populations.    Khon Kaen University(Full time)    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th    0902386892    2025-07-01     2027-07-02    • Submit application through the online portal\n• Initial screening\n• Interviews    The Department of Communications and New Media is seeking applicants for the position of Postdoctoral Fellow in Data Visualization and Analytics, specializing in data visualization and analytics. Applicants should demonstrate a keen understanding of current and emerging trends in the communications industry, as well as excellence and innovation in practice-led pedagogy.  
    Open Custom Field
    Create Custom Field    Responsibilities    textarea    ${EMPTY}
    Close Custom Field
    Input Custom Field    0    This is a full-time position for two years. The successful candidate is expected to teach two courses per year (50%) and work with existing faculty members in pursuing data visualisation and analytics research projects (50%). The successful will also contribute towards publishing top-tier journal articles and curriculum development in data visualisation and analytics. Other responsibilities may include service roles
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[4]
    ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[4]
    ${Status_Text}=    Get Text    xpath=(//span[contains(@class,'status-badge')])[4]
    ${Created_Time_Text} =    Get Text    xpath=(//span[contains(@class, 'me-3')])[4]
    ${Deadline_Text} =    Get Text    xpath=(//div[@class='deadline-info']/span[contains(text(), 'Deadline:')])[4]
    Should Be Equal As Strings    ${Role_Text}    Postdoc
    Should Be Equal As Strings    ${Status_Text}    ACTIVE
    Should Be Equal As Strings    ${Created_Time_Text}    Created: Mar 11, 2025
    Should Be Equal As Strings    ${Deadline_Text}    Deadline: May 04, 2025
    Sleep    1s

Check Postdoc Application Detail
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[4]
    Click Element    xpath=(//a[contains(., 'View Details')])[4]
    ${Detail_Role_Text}=    Get Text    xpath=//h3[contains(@class,'text-primary')]
    ${Detail_Group_Text}=    Get Text    xpath=//p[contains(@class,'text-muted')]   
    ${Detail_Status_Text}=    Get Text    xpath=//span[contains(@class,'badge')]
    Should Be Equal As Strings    ${Detail_Role_Text}    Postdoc Position
    Should Be Equal As Strings    ${Detail_Group_Text}    Research Group: Laboratory, Applied Intelligence and Data Analytics (AIDA)
    Should Be Equal As Strings    ${Detail_Status_Text}    Active
    Verify Input Deadline    May 04, 2025
    Verify Input Vacancies    3
    Verify Input Salary    $61,000    per year
    Verify Input Location    Khon Kaen University(Full time)
    Verify Input Job Detail    The Department of Communications and New Media is seeking applicants for the position of Postdoctoral Fellow in Data Visualization and Analytics, specializing in data visualization and analytics. Applicants should demonstrate a keen understanding of current and emerging trends in the communications industry, as well as excellence and innovation in practice-led pedagogy.
    Scroll Element Into View    xpath=//div[contains(@class, 'detail-card')][.//h5[text()='Required Qualifications']]/div[@class='detail-content']
    Sleep    1s
    Verify Input Required Documents    • A Cover Letter\n• Full CV: academic and employment history, degrees obtained, scholarships and awards, post-doctoral and clinical/ residency training (where applicable), other study and research opportunities, Name of PhD supervisor, etc.\n• A research statement (max of 3 pages) of major accomplishments in research, citing up to five research, citing up to five significant publications, creative work or other scholarly contribution, and explaining their significance. Including sample copies, complete list of publication and impact, and evidence of international visibility.\n• A Teaching Statement that focuses on evidence of student learning and educational leadership (if applicable). A preface (maximum 300 words) that makes the case for your appointment. This should be highly distilled summary of your key contributions to student learning and educational leadership, guided by your teaching philosophy.\n• Scanned copies of academic certificates and transcripts\n• A list of FOUR Referees (including one from the applicant's PhD or post-doctoral advisor/supervisor).
    Verify Input Required Qualifications    Successful candidates must hold a PhD in a discipline closely related to data visualization and analytics by date of appointment, with evidence of interdisciplinary research applying computational methods to the social sciences. This includes but is not limited to social science disciplines (sociology, political science, communication, economics etc.) or computer science and related disciplines (information science, data science, computational physics etc.)
    Verify Input Preferred Qualifications    • Experience that demonstrates a strong publication record.\n• Demonstrated ability or potential to mentor research of undergraduate and graduate students.\n• Demonstrated ability or potential to engage in professional and institutional service and leadership.\n• Evidence of ability to work with diverse student, faculty, and staff populations.
    Scroll Element Into View    xpath=//div[@class='timeline-content'][.//h6[text()='Expected End']]/p 
    Sleep    1s
    Verify Input Timeline    May 04, 2025    Jul 01, 2025    
    Verify Input End Date    Jul 02, 2027
    Verify Input Process    • Submit application through the online portal\n• Initial screening\n• Interviews
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s
    Verify Input Contact    Assoc. Prof. Ngamnij Arch-int    ngamnij@kku.ac.th
    Verify Input Phone    0902386892    
    Verify Input Custom Field    Responsibilities    This is a full-time position for two years. The successful candidate is expected to teach two courses per year (50%) and work with existing faculty members in pursuing data visualisation and analytics research projects (50%). The successful will also contribute towards publishing top-tier journal articles and curriculum development in data visualisation and analytics. Other responsibilities may include service roles
    [Teardown]    Close Browser

# Edit Application
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard
    ${Welcome_Text}=    Get Text    xpath=/html/body/div/div/div/div/h4
    Should Be Equal As Strings    ${Welcome_Text}    Hello Assoc. Prof. Dr. Ngamnij Arch-int
    

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Edit Application
    ${Status_Text}=    Get Text    xpath=(//span[contains(@class,'status-badge')])[1]
    Should Be Equal As Strings    ${Status_Text}    EXPIRED
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    ${Detail_Status_Text_Before}=    Get Text    xpath=//span[contains(@class,'badge')]
    Should Be Equal As Strings    ${Detail_Status_Text_Before}    Expired
    Click Element    xpath=//a[@class='btn btn-warning mt-3 ct-btn me-2']
    Input Date Type    ${FORM_PostdocPATH}    app_deadline    2025-03-30
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Update Application
    Verify Input Deadline    Mar 30, 2025
    ${Detail_Status_Text_After}=    Get Text    xpath=//span[contains(@class,'badge')]
    Should Be Equal As Strings    ${Detail_Status_Text_After}    Active
    [Teardown]    Close Browser
    Sleep    1s
    
# Delete Application
Open Website
    Open Web

Go To Login
    Click Login

Login
    Input Email    ngamnij@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard
    ${Welcome_Text}=    Get Text    xpath=/html/body/div/div/div/div/h4
    Should Be Equal As Strings    ${Welcome_Text}    Hello Assoc. Prof. Dr. Ngamnij Arch-int

Go To Application Management Page
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Scroll Element Into View    xpath=(//a[contains(@title,"Application")])[2]
    Click Element    xpath=(//a[@title="Application"])[1]

Delete Application
    Delete Application Card    2
    Delete Application Card    2
    Delete Application Card    2

#
Edit Application
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    xpath=//a[@class='btn btn-warning mt-3 ct-btn me-2']
    Input Date Type    ${FORM_PostdocPATH}    app_deadline    2025-02-04
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Update Application
    Verify Input Deadline    Feb 04, 2025
    ${Detail_Status_Text_After}=    Get Text    xpath=//span[contains(@class,'badge')]
    Should Be Equal As Strings    ${Detail_Status_Text_After}    Expired
    [Teardown]    Close Browser
    Sleep    1s
    

