## 学习《大话设计模式》的整理代码

### 单一职责

##### 就一个类而言，应该仅有一个引起它变化的原因。

- 如果一个类承担的职责过多，就等于把这些职责耦合在一起，
一个职责的变化可能会削弱或者抑制这个类完成其他职责的能力。
这种耦合会导致脆弱的设计，当变化产生时，设计会遭到意想不到的破坏。

- 软件设计真正要做的许多内容，就是发现职责并把那些职责相互分离。
如果你能够想到多余一个的动机去改变一个类，那么这个类就具有多余一个的职责。

### 开放-封闭原则

##### 软件实体（类、模块、函数等等）应该可以扩展，但是不可修改。

- 对于扩展是开放的，对于更改是封闭的。

- 怎样的设计才能面对需求的改变却可以保持相对稳定，从而使得系统
可以在第一个版本以后不断推出新的版本呢？

- 无论模块是多么的封闭，都会存在一些无法对之封闭的变化。即然不可能完全封闭，
设计人员必须对于他设计的模块应该对那种变化封闭做出选择。
他必须先猜测出最有可能发生变化的种类，然后构造抽象来隔离那些变化。

- 我们可以在发生小变化时，就及早去想办法应对发生更大变化的可能。
等到变化发生时立即采取行动。在我们最初编程写代码时，假设变化不会发生，
当变化发生时，我们就创建抽象来隔离以后发生的同类变化。

- 面对需求，对程序的改动是通过增加新的代码进行的，而不是更改现有的代码。

- 我们希望的是在开发工作展开不久就可以知道能发生的变化。
查明可能发生的变化所等待的时间越长，要创建正确的抽象就越难。

- 开发人员应该仅对程序中呈现出频繁变化的那些部分做出抽象，然而，
对于应用程序中的每个部分都刻意地进行抽象同样不是一个好主意。
拒绝不成熟的抽象和抽象本身一样重要。

### 依赖倒转原则

##### 高层模块不应该依赖低层模块，两个都应该依赖抽象。
##### 抽象不应该依赖细节，细节应该依赖抽象。

- 针对接口编程，不要对现实编程。

### 里氏代换原则

##### 子类型必须能够替换掉它们的父类型。

- 一个软件实体如果使用的是一个父类的话，那么一定适用于子类，
而它察觉不出父类对象和子类对象的区别。也就是说，在软件里面，
把父类都替换成它的子类，程序的行为没有变化。

- 只有当子类可以替换掉父类，软件单位的功能不受影响时，
父类才能真正被复用，而子类也能够在父类的基础上增加新的行为。

- 正是由于子类型的可替换性才使得使用父类类型的模块在无修改的情况下就可以扩展。

- 依赖倒转其实可以说是面向对象设计的标志，用那种语言来编写程序不重要，
如果编写时考虑的都是如何针对抽象编程而不是针对细节编程，
即程序中所有的依赖关系都是终止于抽象类或者接口，那么就是面向对象的设计，
反之那就是过程化的设计了。

### 迪米特法则（最少知识原则）

##### 如果两个类不必彼此直接通信，那么这两个类就不应当发生直接
的相互作用。如果其中一个类需要调用另一个类的某一个方法的话，
可以通过第三者转发这个调用。

- 在类的结构设计上，每一个类都应当尽量降低成员的访问权限。

- 迪米特法则其根本思想，是强调了类之间的松耦合。

- 类之间的耦合越弱，越有利于复用，一个处在弱耦合的类被修改，
不会对有关系的类造成波及。

### 合成/聚合复用原则

##### 尽量使用合成/聚合，尽量不要使用类继承

- 子类的实现与它的父类有非常紧密的依赖关系，以至于父类实现中的任何变化必然会导致子类发生变化。
当你需要复用子类时，如果继承下来的实现不适合解决新的问题，则父类必须重写或被其它更适合的类替换，
这中依赖关系限制了灵活性并最终限制了复用性。

- 聚合表示一种弱的拥有关系，体现的是A对象可以包含B对象，
但B对象不是A对象的一部分；合成则是一种强拥有关系，体现了严格
的部分和整体的关系，部分和整体的生命周期一样。

- 优先使用对象的合成/聚合将有助于你保持每个类被封装，并被集中
在单个任务上，这样类和类继承的层次会保持较小规模，并且不太可能增长为不可控制的庞然大物。

## 设计模式
1. [抽象工厂模式](https://github.com/wenjy/design_patten_php/blob/master/AbstractFactory.php)
2. [适配器模式](https://github.com/wenjy/design_patten_php/blob/master/Adapter.php)
3. [桥接模式](https://github.com/wenjy/design_patten_php/blob/master/Bridge.php)
4. [建造者模式](https://github.com/wenjy/design_patten_php/blob/master/Builder.php)
5. [职责链模式](https://github.com/wenjy/design_patten_php/blob/master/Chain.php)
6. [命令模式](https://github.com/wenjy/design_patten_php/blob/master/Command.php)
7. [组合模式](https://github.com/wenjy/design_patten_php/blob/master/Component.php)
8. [装饰模式](https://github.com/wenjy/design_patten_php/blob/master/Decorator.php)
9. [外观模式](https://github.com/wenjy/design_patten_php/blob/master/Facade.php)
10. [工厂方法模式](https://github.com/wenjy/design_patten_php/blob/master/FactoryMethod.php)
11. [享元模式](https://github.com/wenjy/design_patten_php/blob/master/Flyweight.php)
12. [解释器模式](https://github.com/wenjy/design_patten_php/blob/master/Interpreter.php)
13. [中介者模式](https://github.com/wenjy/design_patten_php/blob/master/Mediator.php)
14. [备忘录模式](https://github.com/wenjy/design_patten_php/blob/master/Memento.php)
15. [观察者模式](https://github.com/wenjy/design_patten_php/blob/master/Observer.php)
16. [简单工厂模式](https://github.com/wenjy/design_patten_php/blob/master/Operation.php)
17. [原型模式](https://github.com/wenjy/design_patten_php/blob/master/Prototype.php)
18. [代理模式](https://github.com/wenjy/design_patten_php/blob/master/Proxy.php)
19. [单例模式](https://github.com/wenjy/design_patten_php/blob/master/Singleton.php)
20. [状态模式](https://github.com/wenjy/design_patten_php/blob/master/State.php)
21. [状态模式1](https://github.com/wenjy/design_patten_php/blob/master/StateWork.php)
22. [策略模式](https://github.com/wenjy/design_patten_php/blob/master/Strategy.php)
23. [模板方法模式](https://github.com/wenjy/design_patten_php/blob/master/TemplateMethod.php)
24. [访问者模式](https://github.com/wenjy/design_patten_php/blob/master/Visitor.php)
