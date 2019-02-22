package traits

import (
	"github.com/kataras/iris"
)

type (
	editCycle struct {
		EditBeforeHooks func()
		EditAfterHooks  func()
	}
)

func (c *Traits) editModel(ctx iris.Context) {
	ctx.JSON(iris.Map{})
}
