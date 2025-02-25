***Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PhD_PATH}    (//h4[contains(text(),'PhD Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])
${FORM_PostdocPATH}    (//h4[contains(text(),'Postdoc Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])


***Test Cases***
Open Website
    Open Web

Go To ResearchGroup Page
    Go To Researcher Group

Go To Login
    Click Login

Login
    Input Email    wongsar@kku.ac.th
    Input Password    id:password    123456789
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Create Project
    Click Element    css:button.create-project-btn
    Input Project    Create Application for AI & Machine Learning Innovations    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    111-1111-111
    
Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Create Application for AI & Machine Learning Innovations')]/ancestor::a

Create Application for ResearchAssistant
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    
    #Scroll down to the lowest position
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
    ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[1]
    Should Be Equal As Strings    ${Role_Text}    Research Assistant
    Click Element    xpath=(//a[contains(., 'View Details')])[1]  #Click View details
    ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
    Should Be Equal As Strings  ${Detail_Role}  Research Assistant Position  #Check if show the right one
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s
    Execute Javascript    window.scrollTo(0, 0);
    Sleep    1s

Back to Application Detail
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn

Create Application for Ph.D
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='phd']
    Sleep    1s
    Input Application    ${FORM_PhD_PATH}    2025-02-26    6    • CV/Resume\n• Cover Letter    300,000 - 450,000 per year    • Education - Applicants must be currently enrolled in or have completed a Ph.D. program in Data Science, Computer Science, Statistics, Artificial Intelligence, Mathematics, or a related field.\n• Programming Skills - Proficiency in programming languages such as Python, R, or SQL, along with experience in data analytics tools and libraries like Pandas, NumPy, Scikit-learn, or TensorFlow.    • Teaching experience\n• Industry collaboration experience    40 Hours/Week    Hybrid    2025-04-20     2025-07-10    • Submit application through the online portal\n• Initial screening\n• Interviews    We are looking for highly motivated and talented individuals to join our Data Science & Data Analytics research team as Ph.D. Researchers. This position provides an excellent opportunity to engage in advanced research, develop data-driven solutions, and contribute to innovations in data analytics, big data processing, and predictive modeling. As a Ph.D. Researcher, you will work on complex datasets, apply cutting-edge machine learning techniques, and collaborate with leading experts to publish high-impact research. If you are passionate about pushing the boundaries of data science and analytics, we encourage you to apply!    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
    ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[2]
    Should Be Equal As Strings    ${Role_Text}    PhD
    Click Element    xpath=(//a[contains(., 'View Details')])[2]  #Click View details
    ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
    Should Be Equal As Strings  ${Detail_Role}  PhD Position  #Check if show the right one
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s
    Execute Javascript    window.scrollTo(0, 0);
    Sleep    1s

Back to Application Detail
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn

Create Application for Postdoc
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='postdoc']
    Sleep    1s
    Input Application    ${FORM_PostDoc_PATH}    2025-02-28    5    • Resume\n• Research Statement    120,000 - 210,000 per year    • Education - Applicants must hold a Ph.D. in Data Science, Computer Science, Statistics, Artificial Intelligence, Mathematics, or a related field.\n• Technical Skills - Proficiency in programming languages such as Python, R, or SQL, along with experience in data processing frameworks (e.g., Apache Spark, Hadoop) and machine learning libraries (e.g., TensorFlow, PyTorch, Scikit-learn).    • Industry collaboration experience    Full-time    Office    2025-06-20     2025-12-14    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking highly skilled and motivated postdoctoral researchers to join our Data Science & Data Analytics team. This position offers an excellent opportunity to engage in advanced research, develop innovative data-driven methodologies, and contribute to cutting-edge solutions in areas such as big data analytics, machine learning, and statistical modeling. As a Postdoctoral Researcher, you will work on complex real-world datasets, collaborate with interdisciplinary teams, and publish high-impact research in top-tier journals and conferences. This role is ideal for individuals looking to push the boundaries of data science and make significant contributions to academia and industry.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[3]
    ${Role_Text} =    Get Text    xpath=(//h5[contains(@class, 'role-title')])[3]
    Should Be Equal As Strings    ${Role_Text}    Postdoc
    Click Element    xpath=(//a[contains(., 'View Details')])[3]  #Click View details
    ${Detail_Role}=  Get Text  xpath=//h3[contains(@class,'text-primary')]
    Should Be Equal As Strings  ${Detail_Role}  Postdoc Position  #Check if show the right one
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s
    Execute Javascript    window.scrollTo(0, 0);
    Sleep    1s

Back to Application Detail
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn

Delete Project
    # Click the delete button
    Click Button    xpath=//button[contains(@class, 'btn-danger')]
    Handle Alert    action=ACCEPT

Create Project
    Click Element    css:button.create-project-btn
    Input Project    Create Application for AI & Machine Learning Innovations    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    111-1111-111
    
Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Create Application for AI & Machine Learning Innovations')]/ancestor::a


Create Two Application
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Click Element    xpath=//label[@for='postdoc']
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    
    Sleep    1s
    Input Application    ${FORM_PostDoc_PATH}    2025-02-28    5    • Resume\n• Research Statement    120,000 - 210,000 per year    • Education - Applicants must hold a Ph.D. in Data Science, Computer Science, Statistics, Artificial Intelligence, Mathematics, or a related field.\n• Technical Skills - Proficiency in programming languages such as Python, R, or SQL, along with experience in data processing frameworks (e.g., Apache Spark, Hadoop) and machine learning libraries (e.g., TensorFlow, PyTorch, Scikit-learn).    • Industry collaboration experience    Full-time    Office    2025-06-20     2025-12-14    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking highly skilled and motivated postdoctoral researchers to join our Data Science & Data Analytics team. This position offers an excellent opportunity to engage in advanced research, develop innovative data-driven methodologies, and contribute to cutting-edge solutions in areas such as big data analytics, machine learning, and statistical modeling. As a Postdoctoral Researcher, you will work on complex real-world datasets, collaborate with interdisciplinary teams, and publish high-impact research in top-tier journals and conferences. This role is ideal for individuals looking to push the boundaries of data science and make significant contributions to academia and industry.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s

Delete Project
    Execute JavaScript    window.scrollTo(0, 0)
    # Click the delete button
    Click Button    xpath=//button[contains(@class, 'btn-danger')]
    Handle Alert    action=ACCEPT

Create Project
    Click Element    css:button.create-project-btn
    Input Project    Create Application for AI & Machine Learning Innovations    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    111-1111-111
    
Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Create Application for AI & Machine Learning Innovations')]/ancestor::a


Create Three Application
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Click Element    xpath=//label[@for='phd']
    Click Element    xpath=//label[@for='postdoc']
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    
    Sleep    1s
    Input Application    ${FORM_PhD_PATH}    2025-02-26    6    • CV/Resume\n• Cover Letter    300,000 - 450,000 per year    • Education - Applicants must be currently enrolled in or have completed a Ph.D. program in Data Science, Computer Science, Statistics, Artificial Intelligence, Mathematics, or a related field.\n• Programming Skills - Proficiency in programming languages such as Python, R, or SQL, along with experience in data analytics tools and libraries like Pandas, NumPy, Scikit-learn, or TensorFlow.    • Teaching experience\n• Industry collaboration experience    40 Hours/Week    Hybrid    2025-04-20     2025-07-10    • Submit application through the online portal\n• Initial screening\n• Interviews    We are looking for highly motivated and talented individuals to join our Data Science & Data Analytics research team as Ph.D. Researchers. This position provides an excellent opportunity to engage in advanced research, develop data-driven solutions, and contribute to innovations in data analytics, big data processing, and predictive modeling. As a Ph.D. Researcher, you will work on complex datasets, apply cutting-edge machine learning techniques, and collaborate with leading experts to publish high-impact research. If you are passionate about pushing the boundaries of data science and analytics, we encourage you to apply!    
    Sleep    1s
    Input Application    ${FORM_PostDoc_PATH}    2025-02-28    5    • Resume\n• Research Statement    120,000 - 210,000 per year    • Education - Applicants must hold a Ph.D. in Data Science, Computer Science, Statistics, Artificial Intelligence, Mathematics, or a related field.\n• Technical Skills - Proficiency in programming languages such as Python, R, or SQL, along with experience in data processing frameworks (e.g., Apache Spark, Hadoop) and machine learning libraries (e.g., TensorFlow, PyTorch, Scikit-learn).    • Industry collaboration experience    Full-time    Office    2025-06-20     2025-12-14    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking highly skilled and motivated postdoctoral researchers to join our Data Science & Data Analytics team. This position offers an excellent opportunity to engage in advanced research, develop innovative data-driven methodologies, and contribute to cutting-edge solutions in areas such as big data analytics, machine learning, and statistical modeling. As a Postdoctoral Researcher, you will work on complex real-world datasets, collaborate with interdisciplinary teams, and publish high-impact research in top-tier journals and conferences. This role is ideal for individuals looking to push the boundaries of data science and make significant contributions to academia and industry.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Sleep    1s

Check Application Detail In Group Page
    Switch Tab    0
    Scroll Element Into View    xpath=(//a[contains(@href, 'researchgroupdetail')])[8]
    Click Element     xpath=(//a[contains(@href, 'researchgroupdetail')])[8]
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);

Check Application Detail
    Click Element    xpath=(//a[contains(text(),'รายละเอียด')])[1]
    Execute JavaScript    
    ...    let scrollInterval = setInterval(() => { window.scrollBy(0, 250); }, 500);
    Sleep    2.5s
    Go Back

Update ResearchAssistant Application
    Switch Tab    1
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
    Sleep    1s
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
    
    Edit Application    2025-03-15    1    • CV/Resume\n• Cover Letter    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-15     2025-09-20    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Save Changes
    Sleep   3s

Back to Application Detail
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn

Delete Ph.D Application
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
    Click Element    xpath=(//a[contains(., 'View Details')])[2]
    Click Button    xpath=//button[contains(@class, 'btn-danger')]
    Handle Alert    action=ACCEPT
    Sleep    1s

Postdoc Application Pass Deadline
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[2]
    Click Element    xpath=(//a[contains(., 'View Details')])[2]
    Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
    Input Date Type    ${EMPTY}    app_deadline    2025-01-10
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Save Changes
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn
    Sleep    1s

Project Closed
    Scroll Element Into View    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    xpath=(//a[contains(., 'View Details')])[1]
    Click Element    css:.btn.btn-warning.mt-3.ct-btn.me-2
    Input Date Type    ${EMPTY}    app_deadline    2025-02-10
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Save Changes
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn
    Click Element    css:.btn.btn-secondary.mt-3.ct-btn
    Sleep    2s

Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Create Application for AI & Machine Learning Innovations')]/ancestor::a

Update Project 
    #Click Edit Button
    Click Element    xpath=//button[@data-bs-target='#editProjectModal']
    Edit Project    Create Application for Data Science & Data Analytics    We are looking for highly motivated and talented individuals to join our Data Science & Data Analytics research team as Ph.D. Researchers. This position provides an excellent opportunity to engage in advanced research, develop data-driven solutions, and contribute to innovations in data analytics, big data processing, and predictive modeling.As a Ph.D. Researcher, you will work on complex datasets, apply cutting-edge machine learning techniques, and collaborate with leading experts to publish high-impact research. If you are passionate about pushing the boundaries of data science and analytics, we encourage you to apply!    222-2222-222
    ${Name_Text}    Get Text    xpath=//h3[contains(@class, 'text-primary')]
    Should Be Equal As Strings    ${Name_Text}    Create Application for Data Science & Data Analytics
    ${Contact_Text} =    Get Text    xpath=//p[strong[text()='Contact:']]
    Should Be Equal As Strings    ${Contact_Text}    Contact: 222-2222-222
    Sleep    1s

Delete Project
    # Click the delete button
    Click Button    xpath=//button[contains(@class, 'btn-danger')]
    Handle Alert    action=ACCEPT
    Sleep    2s
    [Teardown]    Close Browser