<?php
session_start();
if (!isset($_SESSION['username'])) {
    $flag = true;
} else {
    $flag = false;
}
?>
<html>
    <head>
        <title>TAS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="scripts/jquery.js"></script>
        <script src="scripts/materialize.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/materialize.css" />

        <script src="scripts/animation.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/display.css" />
        <link rel="shortcut icon" href="favicon.ico">

    </head>
    <body>
        <style>
            body {
                font-family: "Trebuchet MS", Helvetica, sans-serif;
            }
        </style>
        <!-- Menu bar on top left Start-->
        <a data-activates="slide-out" class="button-collapse">
            <i class="menu_black"></i>
        </a>
        <ul id="slide-out" class="side-nav fixed hidden flow-text">
            <li><a name="home" href="home.php">Home</a></li>
            <!--<li><a name="about" class="disabled">About the Test</a></li>-->
            <li><a name="instructions" href="instructions.php">Instructions</a></li>
            <li><a name="personality" href="personality.php">Personality Types</a></li>
            <li><a name="mbti" href="mbti.php">Take Test</a></li>
            <li><a name="profile" href="profile.php">Your Profile</a></li>
            <li><a name="help" href="help.php">Site Help</a></li>
            <li><a name="developers" href="developers.php">Developers</a></li>
            <?php
            if (!$flag) {
                echo '<li><a name="logout" href="logOut.php">Log Out</a></li>';
            }
            ?>
        </ul>
        <!-- Menu bar on top left End-->


        <!-- Login Registration Form Trigger OR Profile Display -->
        <?php
        if ($flag) {    //if flag == true (user is not logged in)
            echo '<a style = "position:fixed; top:20px; right:20px;" id = "members_btn" class =  "modal-trigger waves-effect waves-light btn" href = "#LRForm">Members</a>';
        } else {
            echo '  <div class="chip" style = "position:fixed; top:20px; right:20px;"> <img src="' . $_SESSION['picpath'] . '" alt="Contact Person">' . $_SESSION['username'] . ' </div>';
        }
        ?>
        
        <!-- Login Registration Form Start -->
        <div id="LRForm" class="modal">
            <div class="modal-content">

                <!-- Login Form -->
                <form action="logProcessing.php" method="post"  class = "login col s12" >
                    <div class = "row">
                        <div class = "input-field col s5">
                            <input name = "l_email" type = "email" class = "validate" required autofocus>
                            <label for = "l_email">Email</label>
                        </div>
                        <div class = "input-field col s5">
                            <input name = "l_pwd" type = "password" class = "validate" required >
                            <label for = "l_pwd">Password</label>
                        </div>
                        <div class = "input-field col s2">
                            <button type="submit" class="btn-floating btn-large red" style="float:right;"><i class="send_white"></i></button>
                        </div>
                    </div>
                </form>

                <!-- Registration Form -->
                <form name="log"  action="regProcessing.php" method="post"  class = "col s12 register hidden" >
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" type="text" class="validate" required autofocus>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" type="text" class="validate" required >
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="password" type="password" class="validate" required >
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input name="email" type="email" class="validate" required  >
                            <label for="email">Email</label>
                        </div>
                        <div class = "input-field col s2">
                            <button type="submit" class="btn-floating btn-large red" style="float:right;">
                                <i class="send_white"></i>
                            </button>
                        </div>
                    </div>  
                </form>
            </div>

            <div class="progress">
                <div id="progressBar" class=""></div>
            </div>

            <div class="modal-footer" >
                <a class="modal-action waves-effect waves-green btn-flat " style="text-align:left;" id="logreg">Register</a>
                <a class="modal-action modal-close waves-effect waves-green btn-flat" style="text-align:left;">Close</a>
            </div>
        </div>
        <!-- Login Registration Form End -->

        <div class="container">
            <div class="row">
                <div class="col s12 m12">
                    <ul class="tabs teal darken-4">
                        <li class="tab col s3 m3"><a class="active" href="#test1">1</a></li>
                        <li class="tab col s3 m3"><a href="#test2">2</a></li>
                        <li class="tab col s3 m3"><a href="#test3">3</a></li>
                        <li class="tab col s3 m3"><a href="#test4">4</a></li>
                    </ul>
                </div>

                <!-- First Tab -->
                <div id="test1">
                    <div class="row">
                        <div class="col s2 m4">
                            <div class="card">
                                <div class="card-image " style="border:4px solid white;">
                                    <img class="materialboxed" data-caption="Carl Jung" src="images/carlJung.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col s10 m8">
                            <div class="card grey darken-3">
                                <div class="card-content white-text">
                                    Carl Gustav Jung (/jʊŋ/; German: [ˈkarl ˈɡʊstaf jʊŋ]; 26 July 1875 – 6 June 1961), 
                                    often referred to as C. G. Jung, was a Swiss psychiatrist and psychotherapist who 
                                    founded analytical psychology. His work has been influential not only in psychiatry 
                                    but also in philosophy, anthropology, archaeology, literature, and religious studies. 
                                    He was a prolific writer, though many of his works were not published until after his death.
                                    <br><br>
                                    The central concept of analytical psychology is individuation—the psychological process 
                                    of integrating the opposites, including the conscious with the unconscious, 
                                    while still maintaining their relative autonomy. Jung considered individuation to 
                                    be the central process of human development.
                                    <br><br>
                                    Jung created some of the best known psychological concepts, including the archetype, the collective unconscious, the complex, and extraversion and introversion.
                                    Swiss psychiatrist Carl Jung developed a theory early in the 20th century to 
                                    describe basic individual preferences and explain similarities and differences 
                                    between people.
                                </div>
                                <div class="card-action">
                                    <a href="https://en.wikipedia.org/wiki/Carl_Jung"> Source </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Tab -->
                <div id="test2" class="col s12">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card">
                                <div class="card-image " style="border:4px solid white;">
                                    <img class="materialboxed" src="images/CMB2.jpg">
                                </div>
                                <div class="card-content">
                                    The theory of psychological type comes from C. G. Jung 
                                    who wrote that what appears to be random behavior is actually the result of 
                                    differences in the way people prefer to use their mental capacities. 
                                    He observed that people generally engage in one of two mental functions:
                                    taking in information, which he called perceiving, or
                                    organizing information and coming to conclusions, which he called judging.
                                    <br><br>
                                    Within each of these, Jung saw people preferring to perform that
                                    function in one of two ways. These are called preferences.
                                    He also noted that, although everyone takes in information and
                                    makes decisions, some people prefer to do more taking in information 
                                    (perceiving) and others prefer to do more decision making (judging).

                                    Finally, Jung observed, “Each person seems to be energized more by either 
                                    the external world (extraversion) or the internal world (introversion).”
                                    What Jung called a person's psychological type consists of his or her preference 
                                    in each category.
                                    <br><br>
                                    In 1921, Jung published Psychological Types, 
                                    introducing the idea that each person has a psychological type. 
                                    The academic language of the book made it hard to read and so few people 
                                    could understand and use the ideas for practical purposes.
                                    <br><br>
                                    During World War II, two American women, Isabel Briggs Myers and her mother 
                                    Katharine Cook Briggs, set out to find an easier way for people to use Jung's 
                                    ideas in everyday life. They wanted people to be able to identify their 
                                    psychological types without having to sift through Jung's academic theory.

                                </div>
                                <div class="card-action">
                                    <a href="http://www.myersbriggs.org/my-mbti-personality-type/mbti-basics/c-g-jungs-theory.htm"> Source </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Tab -->
                <div id="test3">
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card white">
                                <div class="card-content black-text">
                                    <div class="card-title">Carl Jung & Psychological Types</div>
                                    The essence of Jung’s theory of psychological types is simple; 
                                    when our minds are active and we are awake, we are alternating 
                                    between taking in information and making decisions in our internal 
                                    and external worlds. 
                                    <br><br>
                                    Jung identified eight different patterns for 
                                    how we carry out these mental activities commonly referred to as the 
                                    function- attitudes, functions- in-attitude or the eight mental processes.
                                    He created these patterns through combining his opposite pairs of attitudes 
                                    and functions. Jung described these eight different patterns in his book 
                                    entitled Psychological Types through characterizations of people 
                                    who habitually prefer one pattern over another – his “eight types."
                                </div>
                                <div class="card-action">
                                    <a href="http://mbtitoday.org/carl-jung-psychological-type/"> Source </a>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m12">
                            <div class="card white">
                                <div class="card-content black-text">
                                    <div class="card-title">MBTI - An Extension of Jung’s Theory</div>
                                    Myers and Briggs considered their work to be an extension of Jung’s theory. 
                                    Based on their study and knowledge of the theory, and the extensive 
                                    testing of questions on friends and family, the mother-daughter team 
                                    created a self-report instrument with questions on four separate dichotomies.
                                    <br><br>
                                    The questions were constructed to require a person to select from opposite poles 
                                    on these dichotomies (forced choice questions) to mirror Jung’s opposites. 
                                    A person’s preferences on each of the dichotomies are scored and reported 
                                    in the form of a four-letter type code.
                                    <br><br>
                                    <blockquote>
                                        The first three dichotomies (thus the first three letters of the type code) 
                                        came directly from Jung’s theory:
                                        <ul>
                                            <li><b>Extraversion (E) or Introversion (I) </b>– How our energy most naturally flows</li>                                        
                                            <li><b>Sensing (S) or INtuition (N) </b>– How we Perceive, or take in information</li>
                                            <li><b>Thinking (T) or Feeling (F) </b>– How we Judge, or evaluate information</li>
                                        </ul>
                                    </blockquote>
                                    The fourth dichotomy (and letter of the type code) was added to incorporate what
                                    Jung had only mentioned in a brief paragraph in Psychological Types; a secondary 
                                    or auxiliary function. Jung had created his descriptions of the eight psychological
                                    types by writing only about a “superior function” (the dominant function) to the
                                    exclusion of the other seven functions. Myers and Briggs saw these descriptions as limiting;
                                    not comprehensive enough to account for how we operate in everyday life.
                                    This dichotomy, called the J–P dichotomy ((J) for Judging or (P), for Perceiving) 
                                    provided a formula for the identification of a dominant function, as well as auxiliary 
                                    function – turning Jung’s eight types into the well-known four-letter 16 MBTI types.
                                    <blockquote>
                                        The dichotomy is an indicator to which kind of function we extravert or show the world:
                                        <ul>
                                            <li><b>Judging Function (J)</b> — We show the world our Thinking (T) or our Feeling (F) function</li>
                                            <li><b>Perceiving Function (P) </b>— We show the world our Sensing (S) or our INtuition (N) function</li>
                                        </ul>
                                    </blockquote>
                                </div>
                                <div class="card-action">
                                    <a href="http://mbtitoday.org/about-the-mbti-indicator/creation-of-the-mbti-types/"> Source </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Tab -->
                <div id="test4" class="col s12">
                    <div class="row">
                        <div class="col s12 m12">
                            <h1 style='text-align:center;'> Applications</h1>
                            <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                    <div class="collapsible-header">1. Work</div>
                                    <div class="collapsible-body">
                                        <p>The Myers Briggs Type Indicator assessment, 
                                            knowledge of personality type and how it is used to make people more 
                                            effective are used by many organizations, large and small throughout 
                                            the world.
                                        </P>
                                        <blockquote>"Since type provides a framework for understanding individual 
                                            differences, and provides a dynamic model of individual development, 
                                            it has found wide application in the many functions that compose an organization," 
                                            <br> - Gordon Lawrence and Charles Martin, Building People, Building Programs (CAPT 2001).
                                        </blockquote>
                                        <p>
                                            <b>Type and Organizations</b><br>
                                            Type can be introduced into an organization to support many functions and
                                            situations including: managing others, development of leadership skills, 
                                            conflict resolution, executive coaching, change management, and other more 
                                            customized needs.
                                            <br><br>
                                            <b>Type and Your Work</b><br>
                                            When you understand your type preferences, you can approach 
                                            your own work in a manner that best suits your style, including: 
                                            how you manage your time, problem solving, best approaches for decision making, 
                                            and dealing with stress. Knowledge of type can help you better understand the 
                                            culture of the place you work, develop new skills, understand your participation
                                            in teams, and cope with change in the workplace.
                                            <br><br>
                                            If your work involves selling, knowledge of type can be helpful in understanding 
                                            what clients need from you, especially how they best like to learn about products 
                                            and services and how they like to interact during the process of gathering 
                                            information and making decisions.

                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header">2. Personality and Careers</div>
                                    <div class="collapsible-body">
                                        <p>
                                            Knowing your personality type, as measured through the Myers-Briggs Type Indicator instrument, 
                                            can help you with career planning at every stage: from your choices of subjects and majors in 
                                            school to choosing your first career, to advancing in your organization or changing careers 
                                            later in life.
                                            <br><br>
                                            People often find difficulty defining what kind of work they want to do or why a given 
                                            field makes them comfortable or uncomfortable. Personality type is a practical tool for 
                                            investigating what works for you, then looking for and recognizing work that satisfies your preferences. 
                                            Knowing your MBTI type may, for example, prove helpful in deciding what specific areas of law, 
                                            medicine, education, or business a person prefers. A person with a preference for Introversion may 
                                            find he or she is happier doing research, while a person who prefers Extraversion may favor a field 
                                            with more interaction with people.
                                            <br><br>
                                            Work environments influence how comfortable you are at your job. Someone with a preference for Introversion, 
                                            for example, who is required to do a lot of detail work or think through a problem, may find it disruptive to
                                            be in an environment that is too loud or where a lot of interaction is required. When you know this about yourself,
                                            you can make arrangements to do your work in a more suitable location or at a time when there is less activity
                                            and interference.
                                            <br><br>
                                            Even when circumstances make it necessary for you to do work that you have not chosen or which you must 
                                            do as part of your overall job description, knowledge and understanding of type can help you discover and 
                                            use your strengths to accomplish the work. When you find an unsatisfactory job fit, you can examine the reasons 
                                            and seek solutions based on your preferences.
                                            <br><br>
                                            When you do have an opportunity to take a new path in your work, type can help you analyze the fit of your 
                                            type with your past work and consider what new direction can best fit with your preferences.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header">3. Professions</div>
                                    <div class="collapsible-body">
                                        <p>
                                            The Myers-Briggs Type Indicator instrument has been extensively studied in various professions. 
                                            Many books and articles have been written about the use of type in professional situations.
                                            <br><br>
                                            <b>The MBTI Instrument and Health Care Professionals</b><br>
                                            When health care professionals understand personality type they have a constructive framework for better 
                                            understanding what both the patient and family members need. With knowledge of the sixteen types, health care providers can adjust communication and better explain the appropriate care programs that best suit the patient. Personality type can assist health care professionals in many ways, including: learning how to be flexible with patients, understanding their reactions to disease, appreciating how they experience stress, determining patient compliance with protocols, and knowing how best to deliver challenging medical news.
                                            <br><br>
                                            <b>The MBTI Instrument and Legal Professionals</b><br>
                                            Personality type has been studied extensively in the legal profession and with law students. 
                                            Legal professionals have also used the concept of personality type to further understand jury members and their 
                                            listening and communication preferences.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header">4. Learning</div>
                                    <div class="collapsible-body">
                                        <p>
                                            When teachers and students understand the differences in their teaching and learning styles, 
                                            communication, and therefore learning, is enhanced. A student's interests and ways of learning 
                                            directly affect how he or she takes in information. This calls on educators to consider different 
                                            teaching approaches, based on the needs of students.
                                            <br><br>
                                            Students whose preferences are different from those of a teacher may find it difficult to adjust
                                            to the classroom atmosphere and the teaching methods of that teacher. Teachers who vary their 
                                            teaching styles after learning about personality type often find they can motivate and teach a
                                            wider range of students, because they are developing diverse approaches that better meet the needs of all students.
                                            <br><br>
                                            When students and teachers disagree, type knowledge can help both to recognize the
                                            validity of the other person's approach and needs. Instead of labeling the student as "misbehaving" 
                                            or the teacher as "unreasonable," differences are better understood and respected.
                                            <br><br>
                                            Parents also have preferences and when these differ from the preferences 
                                            of the teacher, misunderstanding can ensue. For example, a student's preference for 
                                            Extraversion can appear as positive attitude and social adjustment to a parent,
                                            while appearing as disruptive and unproductive to a teacher with a different preference.
                                            <br><br>
                                            A teacher who understands personality type can give feedback to parents in ways 
                                            that respect the child's preferences. And parents who understand type can appreciate
                                            that a teacher's point of view may only reflect his or her own preferences, 
                                            not a rejection of their child.
                                            <br><br>
                                            When the common language of psychological type is understood, lesson plans can be 
                                            tailored to meet the needs of all students. Teachers who know type can then approach
                                            the same lesson in multiple ways, appealing to the preferences of all their students.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header">5. Relationships</div>
                                    <div class="collapsible-body">
                                        <p>
                                            When you understand personality preferences, you can more readily                                            
                                            appreciate differences between you and people closest to you, such as 
                                            spouses, partners, children, and friends. In most areas of life, when
                                            differences between you and another person are bothersome, you can avoid
                                            the other person in some way. But when that person is a loved one or close 
                                            friend, you have a lot to lose by walking away.
                                            <br><br>
                                            Knowledge of personality type allows you to see those differences as
                                            just those—different ways of "being." Instead of labeling a person and 
                                            putting value judgments on his or her behavior, you can learn to see it
                                            as behavior reflecting personality type, not something designed to offend you. 
                                            Many couples learn to appreciate these differences and may even see them in
                                            a humorous light.
                                            <br><br>
                                            Religious organizations, as well as independent counselors, commonly use the 
                                            MBTI instrument for premarital counseling. This allows a new couple to
                                            identify areas of difference that may cause conflict. The respect created
                                            by this awareness can go a long way in weathering married life.
                                            <br><br>
                                            In marital counseling, the use of type can create neutral ground, 
                                            a non judgmental language for discussing misunderstandings and irritations. 
                                            Change in a relationship can begin when there is respect for the qualities 
                                            of each partner. Even when a relationship is ending in divorce, understanding
                                            the influence of type can lead to a much more amicable process and provide 
                                            a less blaming perspective for what happened.
                                            <br><br>
                                            Knowledge of type preferences can also help couples and families negotiate 
                                            differences in several key approaches to lifestyle, intimacy, division of
                                            chores, managing money, and other areas of potential conflict.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header">6. Personal Growth</div>
                                    <div class="collapsible-body">
                                        <p>
                                            Knowledge and understanding of the personality type as assessed by the Myers-Briggs Type Indicator
                                            instrument can be a tool for personal growth, achieving balance, understanding self, 
                                            and creating possibilities. There are many areas where type can be of assistance and some 
                                            are related here with links to offer you more details about applying psychological type to your
                                            personal growth.
                                            <br><br>
                                            Your personality type doesn't change overnight, but each preference helps you in different ways, 
                                            and to different degrees, as you move through your life. Type development is a lifelong process and 
                                            understanding type can help you overcome challenges at various stages of life including youth, 
                                            midlife, retirement, and aging.
                                            <br><br>
                                            Balancing Work and Play is another important part of our daily lives and an awareness of 
                                            personality type can assist in creating the harmony between work life and leisure activities.
                                            <br><br>
                                            Knowledge of type can help people express their spirituality in ways that are comfortable and
                                            rewarding. For people who are already active spiritually, an understanding of type can direct
                                            them toward new more satisfying practices.
                                            <br><br>
                                            There have been many books written about personality type and grief, and it is perhaps one 
                                            of the most profound uses of type. Understanding one's personality type helps a person recognize 
                                            why certain expressions of grief are better suited to his or her personal journey through this 
                                            difficult process.
                                            <br><br>
                                            Clearly, MBTI theory and use is widespread in the fields of counseling and psychology. 
                                            Whether you come to counseling knowing your type or not, your therapist or counselor can
                                            introduce you to type or help you discover practical ways for applying type theory to your
                                            unique situation.
                                            <br><br>
                                            And finally, taking care of your own health or the health of others can be greatly 
                                            influenced by the knowledge of personality type.
                                            <br><br>
                                            It is always important that personality type is not the answer to everything, just 
                                            one more tool to help you grow, achieve, and prosper in your life.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="collapsible-header"><em>Source</em></div>
                                    <div class="collapsible-body">
                                        <p>
                                            <a href="http://www.myersbriggs.org/type-use-for-everyday-life/">www.myersbriggs.org/type-use-for-everyday-life/</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Button at the bottom right--> 
                    <div class="go-btn" style="position: fixed; bottom: 20px; right: 20px;">
                        <a class="waves-effect waves-light btn-large indigo" href="mbti.php">Take Test</a>
                    </div>
                    <!--Button End -->
                </div>
            </div>
        </div>


    </body>
</html>