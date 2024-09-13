package Java.testQuestion.enlightenment;

public class StudentClass {
    private String name;
    private String job;

    public void setName (String name) {
        this.name = name;
    }
    public void setJob (String job) {
        this.job = job;
    }

    public String getName () {
        return name;
    }

    public String getJob () {
        return job;
    }

    public StudentClass () {}

    public StudentClass (String name, String job) {
        this.name = name;
        this.job = job;
    }

    public void printInfo() {
        System.out.println("Name : " + name);
        System.out.println("job : " + job);
    }
}
