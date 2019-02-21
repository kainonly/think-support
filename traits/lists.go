package traits

import (
	"github.com/kataras/iris"
)

func (c *Traits) ListsModel(ctx iris.Context) (int, error) {
	return ctx.JSON(iris.Map{})
}
