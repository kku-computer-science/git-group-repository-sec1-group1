**Settings***
Resource    resource.robot
Library    XML
Library    String

*** Variables ***
${FORM_RESEARCHASSISTANT_PATH}    (//h4[contains(text(),'Research Assistant Application')]/ancestor::div[@class='mt-4 p-4 border rounded bg-light position-relative'])

***Test Cases***
Open Website
    Open Web
    Sleep    1s

Go To Login
    Execute JavaScript    document.evaluate("//a[@class='btn-solid-sm']", document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue.click();
    Switch Tab    1
    Title Should Be    Login

Login
    Input Email    admin@gmail.com
    Input Password    id:password    12345678
    Click Button    Log In
    Title Should Be    Dashboard

Go To Application
    Click Element    xpath=//a[contains(@href, 'researchGroups')]
    Click Element    xpath=(//a[@title="Application"])[1]

Project Empty Name
    Click Element    css:button.create-project-btn
    Input Project    ${EMPTY}    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    111-1111-111

Project Empty Description
    Input Project    Create Application for AI & Machine Learning Innovations    ${EMPTY}    111-1111-111

Project Empty Contact
    Input Project    Create Application for AI & Machine Learning Innovations    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    ${EMPTY}
    Press Keys    NONE    ESC

Create Project
    Click Element    css:button.create-project-btn
    Input Project    Create Application for AI & Machine Learning Innovations    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    111-1111-111
    
Go To Project Detail
    Click Element    xpath=//h5[contains(text(),'Create Application for AI & Machine Learning Innovations')]/ancestor::a

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Deadline
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    ${EMPTY}    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    
    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    ${EMPTY}    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Vacancies
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    ${EMPTY}    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    ${EMPTY}    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Required Documents
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    ${EMPTY}    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    ${EMPTY}    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Salary
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    ${EMPTY}   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    ${EMPTY}    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Required Qualifications
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   ${EMPTY}    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    ${EMPTY}    • Teaching experience\n• Industry collaboration experience    Full-time    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Working Time
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    ${EMPTY}    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    ${EMPTY}    Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Scroll Element Into View    xpath=${FORM_RESEARCHASSISTANT_PATH}//input[@name='working_time[]']
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Work Location
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    ${EMPTY}    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-Time   ${EMPTY}    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Execute JavaScript    window.scrollBy(0, -150)
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Start Date
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    ${EMPTY}     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-Time   Home    ${EMPTY}     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Execute JavaScript    window.scrollBy(0, -50)
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Process
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    ${EMPTY}    We are seeking passionate and motivated individuals to join our AI & Machine Learning Innovations team as Research Assistants. This role offers an exciting opportunity to contribute to cutting-edge research, develop AI models, and explore novel machine learning techniques.    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-Time   Home    2025-03-10     2025-07-07    ${EMPTY}    This is an exciting opportunity for this position.    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Open Form
    Click Element    xpath=//a[contains(text(), 'Create Application')]
    Click Element    xpath=//label[@for='researchAssistant']
    Sleep    1s

Empty Detail
    Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume    600 per hours   • Currently pursuing or have completed a Bachelor's, Master's, or Ph.D. degree in Computer Science, Artificial Intelligence, Data Science, Engineering, Mathematics, or a related field.\n• Programming Proficiency - Experience with Python, R, or other relevant programming languages. Familiarity with AI frameworks such as TensorFlow, PyTorch, or Scikit-learn is preferred.    • Creating Model experience    Full-time    Work from home    2025-05-10     2025-09-12    • Submit application through the online portal\n• Initial screening\n• Interviews    ${EMPTY}    

    # Input Application    ${FORM_RESEARCHASSISTANT_PATH}    2025-02-28    5    • CV/Resume\n• Cover Letter\n• Research Statement    65,000 - 80,000 per month    • Research experience\n• Strong publication record    • Teaching experience\n• Industry collaboration experience    Full-Time   Home    2025-03-10     2025-07-07    • Submit application through the online portal\n• Initial screening\n• Interviews    ${EMPTY}    
    Execute Javascript    window.scrollTo(0, document.body.scrollHeight);
    Click Button    Submit All Applications
    Sleep    1s
    Scroll Element Into View    css:.btn.btn-secondary.mt-3
    Click Element    css:.btn.btn-secondary.mt-3

Delete Project
    # Click the delete button
    Click Button    xpath=//button[contains(@class, 'btn-danger')]
    Handle Alert    action=ACCEPT
    Sleep    1s
    [Teardown]    Close Browser